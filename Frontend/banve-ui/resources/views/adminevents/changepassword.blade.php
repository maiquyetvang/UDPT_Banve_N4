@extends('layouts_adminevent.app_admin')

@section('title', 'Change Password')

@section('content')
<section class="vh-90 section">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5" style="border: 1px solid black; padding: 20px; border-radius: 5px;">
                        <h3 class="mb-5 text-center">Change Password</h3>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form id="change-password-form" action="{{ route('password.change') }}" method="post" onsubmit="return validateForm()">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" value="{{ Session::get('user.username') }}" readonly>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="old-password">Old Password</label>
                                        <input type="password" id="old-password" name="oldPassword" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="new-password">New Password</label>
                                        <input type="password" id="new-password" name="newPassword" class="form-control form-control-lg" required>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="repassword">Re-enter New Password</label>
                                        <input type="password" id="repassword" name="repassword" class="form-control form-control-lg" required>
                                    </div>
                                    <div id="error-message" class="mb-4"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="history.back()">Back</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Change Password</button>
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
    const newPassword = document.getElementById('new-password').value;
    const rePassword = document.getElementById('repassword').value;
    const errorMessage = document.getElementById('error-message');
    errorMessage.innerHTML = '';

    if (newPassword.length < 6) {
        showError('New password must be at least 6 characters long');
        return false;
    }

    if (newPassword !== rePassword) {
        showError('New passwords do not match');
        return false;
    }

    return true;
}

function showError(message) {
    const errorMessage = document.getElementById('error-message');
    errorMessage.innerHTML = `<div class="alert alert-danger">${message}</div>`;
    
    // Hide the error message after 3 seconds
    setTimeout(() => {
        errorMessage.innerHTML = '';
    }, 3000);
}
</script>
@endpush
