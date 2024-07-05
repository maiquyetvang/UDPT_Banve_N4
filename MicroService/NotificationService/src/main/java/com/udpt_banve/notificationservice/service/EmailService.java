package com.udpt_banve.notificationservice.service;

import com.udpt_banve.notificationservice.dto.request.BrevoEmailRequest;
import com.udpt_banve.notificationservice.dto.request.EmailRequest;
import com.udpt_banve.notificationservice.dto.request.Recipient;
import com.udpt_banve.notificationservice.dto.request.Sender;
import com.udpt_banve.notificationservice.dto.response.EmailResponse;
import com.udpt_banve.notificationservice.repository.httpclient.EmailClient;
import lombok.AccessLevel;
import lombok.RequiredArgsConstructor;
import lombok.experimental.FieldDefaults;
import lombok.experimental.NonFinal;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
@RequiredArgsConstructor
@FieldDefaults(level = AccessLevel.PRIVATE,makeFinal = true)
@Slf4j
public class EmailService {
    EmailClient emailClient;
    Sender sender = Sender.builder()
            .name("UDPT Bán vé")
            .email("maiquyetvang2002@gmail.com")
            .build();

    @NonFinal
    @Value("${jwt.apikey}")
    protected String apiKey;
    public EmailResponse sendEmail(EmailRequest request) {
               Recipient recipient = Recipient.builder()
                .email(request.getEmail())
                .name(request.getName())
                .build();

        BrevoEmailRequest brevoEmailRequest = BrevoEmailRequest.builder()
                .sender(sender)
                .to(List.of(recipient))
                .subject(request.getSubject())
                .textContent(request.getTextContent())
                .build();
        return emailClient.sendEmail(apiKey,brevoEmailRequest);
    }

    public EmailResponse sendEmail_createdSuccess(EmailRequest request) {
        String htmlContent = htmlTemplate_createSuccess();
        // Replace placeholder with actual user name
        htmlContent = htmlContent.replace("{{userName}}", request.getName());
        Recipient recipient = Recipient.builder()
                .email(request.getEmail())
                .name(request.getName())
                .build();

        BrevoEmailRequest brevoEmailRequest = BrevoEmailRequest.builder()
                .sender(sender)
                .to(List.of(recipient))
                .subject("Tạo tài khoản thành công")
                .htmlContent(htmlContent)
                .build();
        return emailClient.sendEmail(apiKey,brevoEmailRequest);
    }

    private static String htmlTemplate_createSuccess() {
        // Load your HTML template from a file or a resource
        // For simplicity, here we are returning the template as a string
        return "<!DOCTYPE html>\n" +
                "<html>\n" +
                "<head>\n" +
                "    <meta charset=\"UTF-8\">\n" +
                "    <title>Đăng Ký Tài Khoản Thành Công</title>\n" +
                "</head>\n" +
                "<body>\n" +
                "    <div>\n" +
                "        <h2>Chào mừng đến với TFour!</h2>\n" +
                "        <p>Xin chào {{userName}},</p>\n" +
                "        <p>Cảm ơn bạn đã đăng ký tài khoản tại TFour. Tài khoản của bạn đã được tạo thành công.</p>\n" +
                "        <p>Bây giờ bạn có thể đăng nhập bằng email và mật khẩu của mình.</p>\n" +
                "        <p>Nếu bạn có bất kỳ câu hỏi nào, xin vui lòng liên hệ với đội ngũ hỗ trợ của chúng tôi. Chúng tôi luôn sẵn sàng giúp đỡ bạn.</p>\n" +
                "        <p>Trân trọng,</p>\n" +
                "        <p>Đội ngũ TFour</p>\n" +
                "    </div>\n" +
                "</body>\n" +
                "</html>";
    }
}
