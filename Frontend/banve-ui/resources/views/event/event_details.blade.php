<!-- resources/views/event-details.blade.php -->

@extends('layouts.app')
<style>
    /* Custom CSS styles */
    .ticket-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .quantity-selector {
        display: flex;
        align-items: center;
    }
    .quantity-selector button {
        background-color: #007bff;
        color: #fff;
        border: none;
        /* border-radius: 50%; */
        width: 30px;
        height: 30px;
        font-size: 16px;
        cursor: pointer;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }
    .quantity-selector input {
        width: 50px;
        text-align: center;
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 5px;
        margin: 0 5px;
    }
    .ticket-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            display: flex; /* Để các ticket-item nằm trên cùng hàng */
            align-items: center; /* Căn giữa nội dung trong ticket-item */
        }
        .ticket-item-content {
            flex: 1; /* Expand ticket-item-content để chiếm hết khoảng trống */
            margin-right: 20px; /* Khoảng cách bên phải giữa ticket-item và total-box */
        }
        .total-box {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f8f9fa;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            /* z-index: 1000; */
        }
        .containerbimg{
            display: block;
        }
        .bankimages {
            display: flex; /* Hoặc display: grid; */
            gap: 20px; /* Khoảng cách giữa các hình ảnh, tùy chỉnh theo nhu cầu */
        }

        .bankimage {
            flex: 1; /* Phân bổ không gian đều cho mỗi hình ảnh trong flexbox */
            width: 200px; /* Chiều rộng cố định của hình ảnh */
            height: 150px; /* Chiều cao cố định của hình ảnh */
            overflow: hidden; /* Ẩn phần hình ảnh vượt ra ngoài khung */
            display: flex; /* Căn giữa hình ảnh */
            align-items: center; /* Căn giữa hình ảnh theo chiều dọc */
            justify-content: center; /* Căn giữa hình ảnh theo chiều ngang */
        }

        .bankimage img {
            max-width: 100%; /* Đảm bảo hình ảnh không vượt quá chiều rộng của khung chứa */
            max-height: 100%; /* Đảm bảo hình ảnh không vượt quá chiều cao của khung chứa */
            object-fit: cover; /* Cắt và giữ tỷ lệ hình ảnh, lấp đầy khung chứa */
            cursor: pointer;

        }

</style>
@section('content')
<div class="container">
    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @else
        <h1>{{ $eventData['ten'] }}</h1>
        <p>{{ $eventData['moTa'] }}</p>
        <p><strong>Thời gian:</strong> {{ \Carbon\Carbon::parse($eventData['thoiGian'])->format('D, F j - gA') }}</p>
        <p><strong>Địa chỉ:</strong> {{ $eventData['diaChi'] }}</p>
        <p><strong>Tình trạng:</strong> {{ $eventData['tinhTrang'] }}</p>

        <div class="row">
            <div class="col-md-8">
                <h2>Ticket Prices</h2>
                <ul class="list-unstyled">
                    @if ($ticketData && count($ticketData) > 0)
                        @foreach ($ticketData as $ticket)
                        <li class="ticket-item">
                            <div class="ticket-item-content">
                                <div class="ticket-info">
                                    <span>{{ $ticket['loaiVe'] }}: {{ number_format($ticket['gia'], 0, ',', '.') }} VND</span>

                                    <div class="quantity-selector">
                                        <button class="btn btn-primary btn-minus" onclick="updateQuantity('{{ $ticket['maVe'] }}', -1)">-</button>
                                        <input type="text" id="quantity_{{ $ticket['maVe'] }}" name="quantity_{{ $ticket['maVe'] }}" value="0" readonly class="form-control">
                                        <button class="btn btn-primary btn-plus" onclick="updateQuantity('{{ $ticket['maVe'] }}', 1)">+</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <li class="ticket-item">
                            <div class="ticket-item-content">
                                <div class="ticket-info">
                                    <span>Free</span>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div id="totalBox" class="total-box">
            <h4>Total Amount:</h4>
            <span id="totalAmount" name="totalAmount">0 VND</span>
        </div>

        <button class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">Proceed to Payment</button>

        <!-- Payment Modal -->
        <div class="modal " id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Select Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your payment method selection options here -->
                         <div class="containerbimg">
                            <div class="bankimages">
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/vcb.png') }}" alt="Image vbc"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/vtb.png') }}"alt="Image vtb"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/ncb.jpg') }}" alt="Image ncb" id="ncbImage" onclick="sendPaymentData('NCB')"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/agr.png') }}" alt="Image agr"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/bidv.png') }}" alt="Image bidv"></div>
                            </div>
                            <div class="bankimages">
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/cob.png') }}" alt="Image cob"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/exb.png') }}" alt="Image exb"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/tcb.png') }}" alt="Image tcb"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/tpb.png') }}" alt="Image tpb"></div>
                                <div class="bankimage"><img src="{{ asset('frontend/images/logo-banks/vib.png') }}" alt="Image vib"></div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Add your payment processing logic here -->
                        <button type="button" class="btn btn-primary">Proceed to Pay</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

<script>
    
    // Function to update quantity and calculate total amount
    function updateQuantity(ticketId, change) {
        var quantityInput = document.getElementById('quantity_' + ticketId);
        var currentQuantity = parseInt(quantityInput.value);
        var newQuantity = currentQuantity + change;
        if (newQuantity >= 0) {
            quantityInput.value = newQuantity;
            updateTotalAmount(); // Update total amount when quantity changes
        }
    }

    // Function to update total amount based on selected quantities
    function updateTotalAmount() {
        var totalAmount = 0;
        var ticketData = @json($ticketData); // Get ticket data from Blade template

        if (!ticketData) {
            document.getElementById('totalAmount').textContent = 'Free';
            return;
        }

        ticketData.forEach(ticket => {
            var quantity = parseInt(document.getElementById('quantity_' + ticket.maVe).value);
            totalAmount += quantity * parseFloat(ticket.gia.replace(',', '')); // Convert gia to number
        });

        document.getElementById('totalAmount').textContent = totalAmount.toLocaleString() + ' VND'; // Format total amount
    }

    // Initial call to update total amount when page loads
    window.onload = function() {
        updateTotalAmount();
    };
function sendPaymentData(bankCode) {
    let selectedTickets = [];

    // Duyệt qua tất cả các phần tử input có id bắt đầu bằng 'quantity_'
    document.querySelectorAll('input[id^="quantity_"]').forEach(function(input) {
        // Lấy giá trị của input và chuyển đổi sang số nguyên
        let quantity = parseInt(input.value);
        var ticketData = @json($ticketData);

        // Kiểm tra nếu số lượng lớn hơn 0
        if (quantity > 0) {
            // Lấy ticketId từ id của input
            let ticketId = input.id.replace('quantity_', '');

            // Tìm thông tin chi tiết vé từ ticketData
            let selectedTicketData = ticketData.find(ticket => ticket.maVe === ticketId);

            // Kiểm tra nếu tìm thấy thông tin vé
            if (selectedTicketData && quantity > 0) {
            // Thêm vào mảng kết quả số lượng vé tương ứng
            for (let i = 0; i < quantity; i++) {
                selectedTickets.push({
                    stt:i,
                    gia: selectedTicketData.gia,
                    loaiVe: selectedTicketData.loaiVe,
                    tinhtrang: 'chuathanhtoan',
                    maSk: '{{ $eventData["maSk"] }}',
                    maVe: ticketId,
                    tenSk: '{{ $eventData["ten"] }}',
                    maKh: 'user1'
                });
            }
        }
        }
    });

    // Gửi dữ liệu điều khiển đến các bên khác.
    var totalAmountElement = document.getElementById('totalAmount');
    var totalAmountText = totalAmountElement.textContent.replace(' VND', '').replace(/\./g, '').replace(/,/g, ''); // Loại bỏ ' VND', dấu chấm và dấu phẩy
    var totalAmountNumber = parseFloat(totalAmountText); // Chuyển đổi sang số
    var paymentData = {
        amount: totalAmountNumber,
        bankCode: bankCode,
        language: "vn",
        ipAddress: "192.168.1.1"
    };
    
    // Gửi yêu cầu tạo thanh toán
    fetch('http://localhost:8083/api/payment/create', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(paymentData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(response => {
        if (response.code == '00') {
            var url = new URL(response.data);
            var vnp_OrderInfo = url.searchParams.get('vnp_OrderInfo');

            // Optionally, you can decode vnp_OrderInfo if needed
            vnp_OrderInfo = decodeURIComponent(vnp_OrderInfo);

            // Gửi từng vé một lần cho mỗi quantity
            selectedTickets.forEach(ticket => {
                ticket.orderId = vnp_OrderInfo;
                console.log(ticket.orderId);
                fetch('http://localhost:8082/api/Ticket', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(ticket)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Ticket post success:', data);
                    window.open(url, '_blank');
                })
                .catch(error => {
                    console.error('Error posting ticket:', error);
                });
            });
        }
    })
    .catch(error => {
        console.error('Error creating payment:', error);
    });
}

</script>


