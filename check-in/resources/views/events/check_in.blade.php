@extends('layouts.app')

@section('title', 'Event Check-In')

@section('content')
<!-- resources/views/events/check_in.blade.php -->

<style>
    .event-details {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .event-details h3 {
        font-weight: bold;
    }

    .highlighted-form {
        background-color: #fff3cd;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #ffeeba;
    }

    .highlighted-form input {
        font-weight: bold;
    }

    .highlighted-form .btn-primary {
        font-weight: bold;
    }
</style>

<div class="event-details">
    <h3>{{ $event['ten'] }}</h3>
    <p>{{ $event['moTa'] }}</p>
    <p><strong>Thời gian:</strong> {{ $event['thoiGian'] }}</p>
    <p><strong>Địa chỉ:</strong> {{ $event['diaChi'] }}</p>
</div>

<div class="highlighted-form">
    <form action="{{ route('events.processCheckIn') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event['maSk'] }}">
        <div class="form-group">
            <label for="ticket_code">Mã vé:</label>
            <input type="text" id="ticket_code" name="ticket_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Check-in</button>
    </form>
</div>

@endsection
