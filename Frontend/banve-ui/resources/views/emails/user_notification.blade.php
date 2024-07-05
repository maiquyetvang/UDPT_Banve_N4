<!DOCTYPE html>
<html>
<head>
    <title>Thông báo giao dịch thành công</title>
</head>
<body>
    <h1>Thông báo Giao Dịch Thành Công</h1>
    <p>Trạng thái: Thành công</p>
    <p>Số tiền: {{ number_format($details['amount'] / 100) }} VND</p>
    <p>Mã giao dịch: {{ $details['transactionNo'] }}</p>
    <p>Ngân hàng: {{ $details['bankCode'] }}</p>
</body>
</html>
