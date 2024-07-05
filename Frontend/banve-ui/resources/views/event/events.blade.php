<!-- resources/views/events/index.blade.php -->


<style>
    /* .card {
    
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}  */

.card-title {
    color: #333;
    font-weight: bold;
} 

/* .card-text {
    margin-bottom: 8px;
}

.card-subtitle {
    margin-bottom: 15px;
} */
 /* Kiểu dáng cho các loại dữ liệu khác nhau */
 .card-text1 {
    
    }

    .card-text2 {

        font-weight: bold; /* Chữ đậm */
        
    }

    .card-text3 {

        font-style: italic; /* Chữ nghiêng */

    }

 .__color{
    background-color: aqua;
 }
 .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        /* transform: translateY(-10px); */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }
/* Bo tròn góc cho hình ảnh trong card */
.hover-card .card-img-top {
        border-top-left-radius: 30px; /* Bo tròn góc trên bên trái */
        border-top-right-radius: 30px; /* Bo tròn góc trên bên phải */
    }
/* Đảm bảo các ảnh trong card có kích thước nhất định */
.hover-card .card-img-top {
    border-top-left-radius: 30px; /* Bo tròn góc trên bên trái */
    border-top-right-radius: 30px; /* Bo tròn góc trên bên phải */
    object-fit: cover; /* Chỉnh kích thước ảnh sao cho vừa với khung */
    height: 300px; /* Điều chỉnh chiều cao của ảnh */
    width: 100%; /* Đảm bảo ảnh nằm trong phạm vi của card */
}
</style>


        <h2 class="mb-4">Events List</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($events) && count($events) > 0)
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 px-4">
            @foreach ($events as $event)
                <div class="col mb-4">
                    <a href="{{ route('events.show', ['id' => $event['maSk']]) }}" class="card-link">
                        <div class="card h-100 hover-card" style="border-radius: 30px;">
                            <img src="{{ asset('frontend/images/events/event-' . rand(1, 10) . '.jpg') }}" class="card-img-top" alt="Event Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event['ten'] }}</h5>
                                <p class="card-text1">{{ $event['moTa'] }}</p>
                                @if (isset($event['thoiGianFormatted']))
                                    <p class="card-text2">{{ $event['thoiGianFormatted'] }}</p>
                                @endif
                                <p class="card-text3">{{ $event['diaChi'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $events->links('layouts.pagination') }}
        </div>
        @else
            <div class="alert alert-info">No events found.</div>
        @endif
