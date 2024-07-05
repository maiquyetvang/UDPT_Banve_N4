<!-- adminevent_detail.blade.php -->

@extends('layouts_admin.app')

@section('title', 'Event Admin Detail')

@section('content')
<div class="container">
    <h1 class="text-center">Event Admin Details</h1>
    <div class="task-form">
        <h2>Details for {{ $eventAdmin['username'] }}</h2>
        <div>
            <div class="form-group">
                <label for="businessName">Business Name:</label>
                <input type="text" id="businessName" name="businessName" class="form-control" value="{{ $eventAdmin['businessName'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{ $eventAdmin['phoneNumber'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $eventAdmin['email'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="taxCode">Tax Code:</label>
                <input type="text" id="taxCode" name="taxCode" class="form-control" value="{{ $eventAdmin['taxCode'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="headOffice">Head Office:</label>
                <input type="text" id="headOffice" name="headOffice" class="form-control" value="{{ $eventAdmin['headOffice'] }}" readonly>
            </div>

            <!-- Back button -->
            <button class="back-button" onclick="history.back()">Back</button>
        </div>
    </div>
</div>
@endsection
