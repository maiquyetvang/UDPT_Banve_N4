@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if ($vnp_ResponseCode == '00')
        <h2>Kết Quả Giao Dịch VNPay</h2>
        <p>Trạng thái: Thành công</p>
        <p>Số tiền: {{ number_format($vnp_Amount / 100) }} VND</p>
        <p>Mã giao dịch: {{ $vnp_TransactionNo }}</p>
        <p>Ngân hàng: {{ $vnp_BankCode }}</p>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var orderId = {{ $vnp_OrderInfo }};
                console.log(orderId);
                fetch(`http://localhost:8082/api/updateTicketStatus/${orderId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => console.error('Error:', error));
            });
        </script>
    @else
        <div class="alert alert-danger">
            Giao dịch thất bại. Vui lòng thử lại.
        </div>
    @endif
</div>
@endsection
