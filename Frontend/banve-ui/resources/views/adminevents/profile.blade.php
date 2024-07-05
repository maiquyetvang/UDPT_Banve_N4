@extends('layouts_adminevent.app_admin')

@section('title', 'My Business Profile')

@section('content')
<section class="vh-100 section">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5" style="border: 1px solid black; padding: 20px; border-radius: 5px;">
                        <h3 class="mb-5 text-center">My Business Profile</h3>
                        <form id="business-profile-form"action="{{ route('eadmin.updateprofile') }}" method="post" onsubmit="return validateForm()">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" value="{{ $profile['username'] }}" disabled>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="business-name">Business Name</label>
                                        <input type="text" id="business-name" name="businessName" class="form-control form-control-lg" value="{{ $profile['businessName'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="phone-number">Phone Number</label>
                                        <input type="text" id="phone-number" name="phoneNumber" class="form-control form-control-lg" value="{{ $profile['phoneNumber'] }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ $profile['email'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="tax-code">Tax Code</label>
                                        <input type="text" id="tax-code" name="taxCode" class="form-control form-control-lg" value="{{ $profile['taxCode'] }}">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="head-office">Head Office</label>
                                        <input type="text" id="head-office" name="headOffice" class="form-control form-control-lg" value="{{ $profile['headOffice'] }}">
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

{{-- @section('styles')
    <link href="{{ asset('frontend/css/user-profile.css') }}" rel="stylesheet">
@endsection --}}

@push('scripts')
<script>
function validateForm() {
    const phoneNumber = document.getElementById('phone-number').value;
    const errorMessage = document.getElementById('error-message');
    errorMessage.innerHTML = '';

    let hasError = false;

    // Validate phone number
    if (!/^\d{10}$/.test(phoneNumber)) {
        errorMessage.innerHTML += '<div class="alert alert-danger">Phone Number must be 10 digits long.</div>';
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
