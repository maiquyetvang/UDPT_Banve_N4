
{{-- resources/views/home.blade.php --}}

@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="main-banner">
    <div class="owl-carousel owl-banner">
        <div class="item item-1">
            <div class="header-text">
                <span class="category">Summer Events</span>
                <h2>Find Your Perfect Event<br>With Us</h2>
            </div>
        </div>
        <div class="item item-2">
            <div class="header-text">
                <span class="category">Get Tickets Now</span>
                <h2>Secure Your Spot<br>Before They Sell Out</h2>
            </div>
        </div>
        <div class="item item-3">
            <div class="header-text">
                <span class="category">Experience the Best</span>
                <h2>Join Us for<br>Unforgettable Moments</h2>
            </div>
        </div>
    </div>
</div>

{{-- EVENT Ở ĐÂY NHA
======================================================================================
======================================================================================
====================================================================================== --}}






<!-- Updated about-section -->
<div class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about-image">
                    <img src="{{ asset('frontend/images/banner-03.jpg') }}" alt="About Us" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-content">
                    <h3>Về chúng tôi</h3>
                    <h2>Cung cấp vé sự kiện uy tín và đa dạng nhất</h2>
                    <p>Chào mừng bạn đến với trang web của chúng tôi, nơi bạn có thể tìm thấy và mua vé cho các sự kiện lớn và hot nhất hiện nay. Chúng tôi cam kết mang đến trải nghiệm mua vé nhanh chóng, dễ dàng và chất lượng, luôn đáp ứng đầy đủ nhu cầu của khách hàng.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check"></i> Tất cả các sự kiện được liên kết đều là những sự kiện hot nhất và uy tín nhất.</li>
                        <li><i class="fa fa-check"></i> Đội ngũ nhân viên hỗ trợ khách hàng nhanh chóng và hiệu quả.</li>
                        <li><i class="fa fa-check"></i> Hệ thống mua vé nhanh chóng và dễ dàng.</li>
                        <li><i class="fa fa-check"></i> Sự hài lòng của khách hàng luôn là ưu tiên hàng đầu của chúng tôi.</li>
                    </ul>
                    <a href="mailto: tfour@gmail.com" class="contact-link">Liên hệ ngay với chúng tôi qua email: tfour@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa fa-heart"></i></div>
                    <h4>Sự hài lòng của khách hàng là trên hết</h4>
                    <p>Chúng tôi cam kết mang đến sự hài lòng tuyệt đối cho khách hàng.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa fa-map"></i></div>
                    <h4>Mua vé nhanh chóng và đơn giản</h4>
                    <p>Chúng tôi đảm bảo hệ thống mua vé nhanh chóng và đơn giản cho quý khách.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa fa-users"></i></div>
                    <h4>Đội ngũ nhân viên hỗ trợ nhiệt tình</h4>
                    <p>Chúng tôi có đội ngũ nhân viên hỗ trợ khách hàng nhanh chóng và chuyên nghiệp.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box">
                    <div class="feature-icon"><i class="fa fa-clock"></i></div>
                    <h4>Linh động với thời gian của quý khách</h4>
                    <p>Chúng tôi mang đến giải pháp giúp bạn có thể săn vé bất khi nào và ở bất cứ đâu.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(".owl-banner").owlCarousel({
            items: 1,
            loop: true, // Enables continuous looping
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            dots: true,
            navText: ["<div class='owl-prev'><i class='fa fa-chevron-left'></i></div>", "<div class='owl-next'><i class='fa fa-chevron-right'></i></div>"]
        });
    });
</script>
@endpush

