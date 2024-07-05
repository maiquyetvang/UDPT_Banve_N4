@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<section class="vh-100 section">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5" style="border: 1px solid black; padding: 20px; border-radius: 5px;">
                        <h3 class="mb-5 text-center">My Profile</h3>
                        <form id="user-profile-form" action="{{ route('user.updateprofile') }}" method="post" onsubmit="return validateForm()">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" value="{{ $profile['username'] }}" readonly>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="first-name">First Name</label>
                                        <input type="text" id="first-name" name="firstName" class="form-control form-control-lg" value="{{ $profile['firstName'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="last-name">Last Name</label>
                                        <input type="text" id="last-name" name="lastName" class="form-control form-control-lg" value="{{ $profile['lastName'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="gender">Gender</label>
                                        <input type="text" id="gender" name="gender" class="form-control form-control-lg" value="{{ $profile['gender'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="phone-number">Phone Number</label>
                                        <input type="text" id="phone-number" name="phoneNumber" class="form-control form-control-lg" value="{{ $profile['phoneNumber'] }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ $profile['email'] }}" readonly>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="date-of-birth">Date of Birth</label>
                                        <input type="date" id="date-of-birth" name="dateOfBirth" class="form-control form-control-lg" value="{{ $profile['dateOfBirth'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="street">Street</label>
                                        <input type="text" id="street" name="street" class="form-control form-control-lg" value="{{ $profile['street'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="district">District</label>
                                        <input type="text" id="district" name="district" class="form-control form-control-lg" value="{{ $profile['district'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="province">Province</label>
                                        <input type="text" id="province" name="province" class="form-control form-control-lg" value="{{ $profile['province'] }}">
                                    </div>
                                  
                                </div>
                            </div>
                            <div id="error-message" class="mb-4"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="history.back()">Back</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
    <link href="{{ asset('frontend/css/user-profile.css') }}" rel="stylesheet">
@endsection

@push('scripts')
<script>
function validateForm() {
    const phoneNumber = document.getElementById('phone-number').value;
    const dateOfBirthInput = document.getElementById('date-of-birth').value;
    const errorMessage = document.getElementById('error-message');
    errorMessage.innerHTML = '';

    let hasError = false;

    // Validate phone number
    if (!/^\d{10}$/.test(phoneNumber)) {
        errorMessage.innerHTML += '<div class="alert alert-danger">Phone Number must be 10 digits long.</div>';
        hasError = true;
    }

    // Validate date of birth
    const dateOfBirth = new Date(dateOfBirthInput);
    const today = new Date();

    // Ensure dateOfBirth is before today
    if (dateOfBirth >= today) {
        errorMessage.innerHTML += '<div class="alert alert-danger">Date of Birth must be a past date.</div>';
        hasError = true;
    }

    // Hide error message after 3 seconds
    if (hasError) {
        setTimeout(() => {
            errorMessage.innerHTML = '';
        }, 3000);
    }

    return !hasError;
}
</script>
@endpush
