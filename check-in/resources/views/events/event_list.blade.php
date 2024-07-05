@extends('layouts.app')

@section('title', 'Event List')

@section('content')
<!-- resources/views/events/index.blade.php -->

<style>
    .card-title {
        color: #333;
        font-weight: bold;
    }

    .card-text1 {}

    .card-text2 {
        font-weight: bold;
    }

    .card-text3 {
        font-style: italic;
    }

    .__color {
        background-color: aqua;
    }

    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .hover-card .card-img-top {
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        object-fit: cover;
        height: 300px;
        width: 100%;
    }

    .checkin-button {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border-radius: 30px;
        padding: 10px 20px;
        text-align: center;
        display: block;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .checkin-button:hover {
        background-color: #0056b3;
        color: white;
        text-decoration: none;
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
                <div class="card h-100 hover-card" style="border-radius: 30px;">
                    <img src="{{ asset('event.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event['ten'] }}</h5>
                        <p class="card-text1">{{ $event['moTa'] }}</p>
                        @if (isset($event['thoiGianFormatted']))
                            <p class="card-text2">{{ $event['thoiGianFormatted'] }}</p>
                        @endif
                        <p class="card-text3">{{ $event['diaChi'] }}</p>
                        <form action="{{ route('events.showCheckIn') }}" method="POST">
                            @csrf
                            <input type="hidden" name="maSk" value="{{ $event['maSk'] }}">
                            <input type="hidden" name="ten" value="{{ $event['ten'] }}">
                            <input type="hidden" name="moTa" value="{{ $event['moTa'] }}">
                            <input type="hidden" name="thoiGian" value="{{ $event['thoiGianFormatted'] }}">
                            <input type="hidden" name="diaChi" value="{{ $event['diaChi'] }}">
                            <button type="submit" class="checkin-button">Check-in</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $events->links('layouts.pagination') }}
    </div>
@else
    <div class="alert alert-info">No events found.</div>
@endif

@endsection
