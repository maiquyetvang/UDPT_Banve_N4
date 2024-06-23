package api.controller;

import com.google.gson.JsonObject;
import config.VNPayConfig;
import jakarta.servlet.http.HttpServletRequest;

import org.springframework.web.bind.annotation.*;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.nio.charset.StandardCharsets;
import java.text.SimpleDateFormat;
import java.util.*;

@RestController
@RequestMapping("/api/payment")
public class Controller {

    @PostMapping("/create")
    public String createPayment(@RequestBody PaymentRequest paymentRequest) {
        try {
            String vnp_Version = "2.1.0";
            String vnp_Command = "pay";
            String orderType = "other";
            long amount = Long.parseLong(paymentRequest.getAmount()) * 100;
            String bankCode = paymentRequest.getBankCode();

            String vnp_TxnRef = VNPayConfig.getRandomNumber(8);
            String vnp_IpAddr = VNPayConfig.getIpAddress(null);

            String vnp_TmnCode = VNPayConfig.vnp_TmnCode;

            Map<String, String> vnp_Params = new HashMap<>();
            vnp_Params.put("vnp_Version", vnp_Version);
            vnp_Params.put("vnp_Command", vnp_Command);
            vnp_Params.put("vnp_TmnCode", vnp_TmnCode);
            vnp_Params.put("vnp_Amount", String.valueOf(amount));
            vnp_Params.put("vnp_CurrCode", "VND");

            if (bankCode != null && !bankCode.isEmpty()) {
                vnp_Params.put("vnp_BankCode", bankCode);
            }
            vnp_Params.put("vnp_TxnRef", vnp_TxnRef);
            vnp_Params.put("vnp_OrderInfo", "Thanh toan don hang:" + vnp_TxnRef);
            vnp_Params.put("vnp_OrderType", orderType);

            String locate = paymentRequest.getLanguage();
            if (locate != null && !locate.isEmpty()) {
                vnp_Params.put("vnp_Locale", locate);
            } else {
                vnp_Params.put("vnp_Locale", "vn");
            }
            vnp_Params.put("vnp_ReturnUrl", VNPayConfig.vnp_ReturnUrl);
            vnp_Params.put("vnp_IpAddr", vnp_IpAddr);

            Calendar cld = Calendar.getInstance(TimeZone.getTimeZone("Etc/GMT+7"));
            SimpleDateFormat formatter = new SimpleDateFormat("yyyyMMddHHmmss");
            String vnp_CreateDate = formatter.format(cld.getTime());
            vnp_Params.put("vnp_CreateDate", vnp_CreateDate);

            cld.add(Calendar.MINUTE, 15);
            String vnp_ExpireDate = formatter.format(cld.getTime());
            vnp_Params.put("vnp_ExpireDate", vnp_ExpireDate);

            List<String> fieldNames = new ArrayList<>(vnp_Params.keySet());
            Collections.sort(fieldNames);
            StringBuilder hashData = new StringBuilder();
            StringBuilder query = new StringBuilder();
            Iterator<String> itr = fieldNames.iterator();
            while (itr.hasNext()) {
                String fieldName = itr.next();
                String fieldValue = vnp_Params.get(fieldName);
                if ((fieldValue != null) && (fieldValue.length() > 0)) {
                    hashData.append(fieldName);
                    hashData.append('=');
                    hashData.append(URLEncoder.encode(fieldValue, StandardCharsets.US_ASCII.toString()));
                    query.append(URLEncoder.encode(fieldName, StandardCharsets.US_ASCII.toString()));
                    query.append('=');
                    query.append(URLEncoder.encode(fieldValue, StandardCharsets.US_ASCII.toString()));
                    if (itr.hasNext()) {
                        query.append('&');
                        hashData.append('&');
                    }
                }
            }
            String queryUrl = query.toString();
            String vnp_SecureHash = VNPayConfig.hmacSHA512(VNPayConfig.secretKey, hashData.toString());
            queryUrl += "&vnp_SecureHash=" + vnp_SecureHash;
            String paymentUrl = VNPayConfig.vnp_PayUrl + "?" + queryUrl;
            JsonObject job = new JsonObject();
            job.addProperty("code", "00");
            job.addProperty("message", "success");
            job.addProperty("data", paymentUrl);
            return job.toString();
        } catch (Exception e) {
            JsonObject job = new JsonObject();
            job.addProperty("code", "99");
            job.addProperty("message", "error");
            job.addProperty("data", e.getMessage());
            return job.toString();
        }
    }


    @PostMapping("/query")
    public String queryPayment(HttpServletRequest req) {
        try {
            // Retrieve parameters from VNPay callback
            String vnp_Amount = req.getParameter("vnp_Amount");
            String vnp_BankCode = req.getParameter("vnp_BankCode");
            String vnp_BankTranNo = req.getParameter("vnp_BankTranNo");
            String vnp_CardType = req.getParameter("vnp_CardType");
            String vnp_OrderInfo = req.getParameter("vnp_OrderInfo");
            String vnp_PayDate = req.getParameter("vnp_PayDate");
            String vnp_ResponseCode = req.getParameter("vnp_ResponseCode");
            String vnp_TmnCode = req.getParameter("vnp_TmnCode");
            String vnp_TransactionNo = req.getParameter("vnp_TransactionNo");
            String vnp_TransactionStatus = req.getParameter("vnp_TransactionStatus");
            String vnp_TxnRef = req.getParameter("vnp_TxnRef");
            String vnp_SecureHash = req.getParameter("vnp_SecureHash");

            // Validate the vnp_SecureHash to ensure data integrity
            String hashData = String.format("vnp_Amount=%s&vnp_BankCode=%s&vnp_BankTranNo=%s&vnp_CardType=%s&vnp_OrderInfo=%s&vnp_PayDate=%s&vnp_ResponseCode=%s&vnp_TmnCode=%s&vnp_TransactionNo=%s&vnp_TransactionStatus=%s&vnp_TxnRef=%s",
                    vnp_Amount, vnp_BankCode, vnp_BankTranNo, vnp_CardType, vnp_OrderInfo, vnp_PayDate, vnp_ResponseCode, vnp_TmnCode, vnp_TransactionNo, vnp_TransactionStatus, vnp_TxnRef);
            String calculatedHash = VNPayConfig.hmacSHA512(VNPayConfig.secretKey, hashData);

            if (!calculatedHash.equals(vnp_SecureHash)) {
                throw new Exception("Invalid SecureHash");
            }

            // Check vnp_ResponseCode for success
            if ("00".equals(vnp_ResponseCode)) {
                // Example response or further processing
                JsonObject response = new JsonObject();
                response.addProperty("code", "00");
                response.addProperty("message", "success");
                response.addProperty("data", "Payment callback received successfully");

                return response.toString();
            } else {
                // Handle other response codes if needed
                JsonObject response = new JsonObject();
                response.addProperty("code", "99");
                response.addProperty("message", "error");
                response.addProperty("data", "Payment callback failed with vnp_ResponseCode: " + vnp_ResponseCode);

                return response.toString();
            }
        } catch (Exception e) {
            JsonObject errorResponse = new JsonObject();
            errorResponse.addProperty("code", "99");
            errorResponse.addProperty("message", "error");
            errorResponse.addProperty("data", e.getMessage());
            return errorResponse.toString();
        }
    }
}
