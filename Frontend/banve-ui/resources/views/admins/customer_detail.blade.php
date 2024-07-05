@extends('layouts_admin.app')

@section('title', 'Customer Details')

@section('content')
<div class="container">
    <h1 class="text-center">Customer Details</h1>
    <div class="task-form">
        <h2>Details for {{ $customer['username'] }}</h2>
        <div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" class="form-control" value="{{ $customer['firstName'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" class="form-control" value="{{ $customer['lastName'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" class="form-control" value="{{ $customer['gender'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{ $customer['phoneNumber'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $customer['email'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth:</label>
                <input type="text" id="dateOfBirth" name="dateOfBirth" class="form-control" value="{{ $customer['dateOfBirth'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" id="street" name="street" class="form-control" value="{{ $customer['street'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" id="district" name="district" class="form-control" value="{{ $customer['district'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="province">Province:</label>
                <input type="text" id="province" name="province" class="form-control" value="{{ $customer['province'] }}" readonly>
            </div>

            <!-- Back button -->
            <button class="back-button" onclick="history.back()">Back</button>
        </div>
    </div>
</div>
@endsection
