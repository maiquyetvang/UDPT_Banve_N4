@extends('layouts_adminevent.app_admin')

@section('title', 'Hợp Đồng')

@section('content')
<div class="contract-print-area">
    <h1>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h1>
    <h2>Độc lập – Tự do – Hạnh phúc</h2>
    <h3 style="text-align: center;">-------***-------</h3>

    <h2>HỢP ĐỒNG HỢP TÁC KINH DOANH</h2>
    <h3 style="text-align: center;">Số: ......./20…/...-.../HDHTKD</h3>

    <div class="section">
        <p>
            · Căn cứ qui định tại Bộ luật dân sự năm 2015 do Quốc hội nước CHXHCN Việt Nam ban hành;<br>
            · Căn cứ luật Luật Thương mại số 36/2005/QH11 do Quốc hội nước CHXHCN Việt Nam ban hành ngày 14 tháng 06 năm 2005;<br>
            · Căn cứ vào khả năng và nhu cầu của hai bên và dựa trên tinh thần trung thực và thiện chí hợp tác của các bên.
        </p>
    </div>

    <div class="section">
        <h3>Chúng tôi gồm có:</h3>
        <p>
            <b>BÊN A: CÔNG TY TNHH TFOUR - EVENT TICKET</b><br>
            Địa chỉ trụ sở: 227 Nguyễn Văn Cừ, Phường 4, Quận 5, TP. Hồ Chí Minh<br>
            Người đại diện: Mai Quyết Vang - Giám đốc<br>
            Mã số thuế: 0178467893 - 001
        </p>
        <p>
            <b>BÊN B: {{ $profile['businessName'] }}</b><br>
            Địa chỉ trụ sở: {{ $profile['headOffice'] }}<br>
            Người đại diện: {{  $profile['username'] }} - Chức danh: Quản lí<br>
            Mã số thuế: {{ $profile['taxCode'] }}
        </p>
    </div>

    <div class="section">
        <h3>Điều 1. Mục tiêu và phạm vi hợp tác kinh doanh</h3>
        <p>
            Bên A cung cấp dịch vụ thiết kế, xây dựng và vận hành trang web cho sự kiện do Bên B tổ chức.<br>
            Phạm vi hợp tác bao gồm tất cả các dịch vụ liên quan đến việc thiết kế, xây dựng, và bảo trì trang web cho sự kiện.
        </p>
    </div>

    <div class="section">
        <h3>Điều 2. Thời hạn hợp đồng</h3>
        <p>
            Thời hạn hợp đồng là 01 (một) năm kể từ ngày ký kết, có thể gia hạn theo thỏa thuận bằng văn bản của hai bên.
        </p>
    </div>

    <div class="section">
        <h3>Điều 3. Góp vốn và phân chia lợi nhuận</h3>
        <p>
            Bên A chịu trách nhiệm toàn bộ chi phí thiết kế và vận hành trang web.<br>
            Bên B chịu trách nhiệm chi phí tổ chức sự kiện và quảng bá.<br>
            Lợi nhuận từ việc bán vé và các dịch vụ khác sẽ được phân chia theo tỷ lệ Bên A: 30%, Bên B: 70%.
        </p>
    </div>

    <div class="section">
        <h3>Điều 4. Quyền và nghĩa vụ của các bên</h3>
        <p>
            <b>Bên A:</b><br>
            - Cung cấp dịch vụ trang web theo yêu cầu của Bên B.<br>
            - Bảo trì, cập nhật nội dung trang web trong suốt thời gian hợp đồng.
        </p>
        <p>
            <b>Bên B:</b><br>
            - Cung cấp thông tin chi tiết về sự kiện cho Bên A.<br>
            - Thanh toán đầy đủ và đúng hạn các chi phí dịch vụ theo thỏa thuận.
        </p>
    </div>

    <div class="section">
        <h3>Điều 5. Điều khoản và điều kiện</h3>
        <div class="terms-section">
            <p><b>1. Giới thiệu</b></p>
            <p>
                Chào mừng bạn đến với TFout-Event ticket. Những Điều Khoản và Điều Kiện này điều chỉnh việc sử dụng của bạn trên trang web và dịch vụ của chúng tôi. Bằng cách truy cập hoặc sử dụng trang web của chúng tôi, bạn đồng ý tuân thủ những điều khoản này. Nếu bạn không đồng ý với bất kỳ điều khoản nào trong những điều khoản này, bạn không nên sử dụng trang web của chúng tôi.
            </p>
            <p><b>2. Dịch vụ</b></p>
            <p>
                TFout-Event ticket cung cấp một nền tảng cho các tổ chức sự kiện để đăng ký, tạo và quản lý sự kiện. Dịch vụ của chúng tôi có thể bao gồm các tính năng hoặc công cụ bổ sung được thêm vào từ thời gian này qua thời gian khác. Chúng tôi có quyền sửa đổi hoặc ngừng cung cấp dịch vụ của chúng tôi vào bất kỳ thời điểm nào mà không cần thông báo trước.
            </p>
            <p><b>3. Trách nhiệm của người dùng</b></p>
            <p>
                Bạn đồng ý sử dụng trang web và dịch vụ của chúng tôi tuân thủ tất cả các luật pháp áp dụng. Bạn chịu trách nhiệm đảm bảo việc sử dụng dịch vụ của chúng tôi tuân thủ những Điều Khoản và Điều Kiện này. Bạn cũng chịu trách nhiệm bảo mật thông tin tài khoản của bạn và cho tất cả các hoạt động diễn ra dưới tài khoản của bạn.
            </p>
            <p><b>4. Sở hữu trí tuệ</b></p>
            <p>
                Tất cả nội dung và tài liệu trên trang web của chúng tôi, bao gồm nhưng không giới hạn đến văn bản, đồ họa, logo và hình ảnh, là tài sản của TFout-Event ticket hoặc các bên cấp phép của chúng tôi và được bảo vệ bởi bản quyền và các luật sở hữu trí tuệ khác. Bạn không được sử dụng, sao chép hoặc phân phối bất kỳ nội dung nào từ trang web của chúng tôi mà không có sự cho phép bằng văn bản từ chúng tôi.
            </p>
            <p><b>5. Giới hạn trách nhiệm</b></p>
            <p>
                TFout-Event ticket không chịu trách nhiệm đối với bất kỳ thiệt hại nào phát sinh từ việc sử dụng hoặc không thể sử dụng trang web hoặc dịch vụ của chúng tôi, kể cả thiệt hại trực tiếp, gián tiếp, ngẫu nhiên, đặc biệt hoặc bất kỳ thiệt hại nào khác, ngay cả khi đã được thông báo về khả năng của các thiệt hại này.
            </p>
        </div>
    </div>

    <div class="section">
        <h3>Điều 6. Giải quyết tranh chấp</h3>
        <p>
            Mọi tranh chấp phát sinh từ hoặc liên quan đến hợp đồng này sẽ được giải quyết thông qua thương lượng hòa giải. Trong trường hợp không thể giải quyết qua thương lượng, tranh chấp sẽ được đưa ra Tòa án nhân dân cấp cao tại TP. Hồ Chí Minh giải quyết theo pháp luật hiện hành của nước Cộng hòa Xã hội chủ nghĩa Việt Nam.
        </p>
    </div>

    <div class="section">
        <h3>Điều 7. Hiệu lực hợp đồng</h3>
        <p>
            Hợp đồng này có hiệu lực kể từ ngày ký kết của cả hai bên.
        </p>
    </div>

    <div class="section">
        <h3>Điều 8. Điều khoản cuối cùng</h3>
        <p>
            Hợp đồng này được lập thành 02 (hai) bản có giá trị pháp lý như nhau, mỗi bên giữ 01 (một) bản.
        </p>
    </div>

    <div class="signature">
        <div class="left">
            <p><b>Bên A</b></p>
            <p>Mai Quyết Vang</p>
        </div>
        <div class="right">
            <p><b>Bên B</b></p>
            <p>{{  $profile['username'] }}</p>
        </div>
    </div>
</div>

<button class="print-button" onclick="window.print();">Print</button>
@endsection




@push('styles')
<style>
  
    body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 20px;
    border: 1px solid #000; /* Đường viền cho toàn bộ hợp đồng */
    padding: 20px;
}
    h1, h2 {
        text-align: center;
    }
    .section {
        margin-bottom: 20px;
    }
    .terms-section {
        margin-bottom: 20px;
        font-size: 14px;
    }
    .signature {
        margin-top: 50px;
        display: flex;
        justify-content: space-between;
    }
    .signature div {
        text-align: center;
    }
    .print-button {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    /* Căn chỉnh chữ ký ngang nhau */
.signature {
    margin-top: 50px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end; /* Canh chữ ký ngang nhau */
}
.signature .left,
.signature .right {
    width: 48%;
}
.signature p {
    margin: 0;
}

/* Chỉ in phần nội dung hợp đồng mà không in layout */
@media print {
    /* Ẩn các phần không cần in */
    body {
        visibility: hidden;
    }

    .contract-print-area {
        visibility: visible;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .print-button {
        display: none;
    }
}

</style>
@endpush