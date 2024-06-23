@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<section class="vh-100 section">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <h3 class="mb-5 text-center">My Profile</h3>
                        <form id="user-profile-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="first-name">First Name</label>
                                        <div class="input-group">
                                            <input type="text" id="first-name" name="firstName" class="form-control form-control-lg" value="John" readonly>
                                            <span class="input-group-text edit-icon" data-field="first-name">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="last-name">Last Name</label>
                                        <div class="input-group">
                                            <input type="text" id="last-name" name="lastName" class="form-control form-control-lg" value="Doe" readonly>
                                            <span class="input-group-text edit-icon" data-field="last-name">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="gender">Gender</label>
                                        <div class="input-group">
                                            <input type="text" id="gender" name="gender" class="form-control form-control-lg" value="Male" readonly>
                                            <span class="input-group-text edit-icon" data-field="gender">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="phone-number">Phone Number</label>
                                        <div class="input-group">
                                            <input type="text" id="phone-number" name="phoneNumber" class="form-control form-control-lg" value="0123456789" readonly>
                                            <span class="input-group-text edit-icon" data-field="phone-number">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="date-of-birth">Date of Birth</label>
                                        <div class="input-group">
                                            <input type="text" id="date-of-birth" name="dateOfBirth" class="form-control form-control-lg" value="1990-01-01" readonly>
                                            <span class="input-group-text edit-icon" data-field="date-of-birth">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="street">Street</label>
                                        <div class="input-group">
                                            <input type="text" id="street" name="street" class="form-control form-control-lg" value="123 Đường ABC" readonly>
                                            <span class="input-group-text edit-icon" data-field="street">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="district">District</label>
                                        <div class="input-group">
                                            <input type="text" id="district" name="district" class="form-control form-control-lg" value="Quận 1" readonly>
                                            <span class="input-group-text edit-icon" data-field="district">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="province">Province</label>
                                        <div class="input-group">
                                            <input type="text" id="province" name="province" class="form-control form-control-lg" value="Hồ Chí Minh" readonly>
                                            <span class="input-group-text edit-icon" data-field="province">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="input-group">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" value="johndoe@example.com" readonly>
                                            <span class="input-group-text edit-icon" data-field="email">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-9Ss9z20YnC3uQUb5u5ZVtP2l+jOIaUIYZ8j1RBpo4pPkm3GPNTKtMePMYY5dyW3cLvIvUZuov1V4t6W5CsfHlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-q4kFB3IeR68c6AWrBpAa/H2fpfH9BG4Q1hCuj92V6KgAHsR7K1Sm09y8EiL2ZV7BsmFbw4fJEmoCFbDszpPmOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.edit-icon').click(function() {
                var fieldName = $(this).data('field');
                var inputField = $('#' + fieldName);
                inputField.removeAttr('readonly');
                inputField.focus();
                $(this).hide();
            });
        });
    </script>
@endsection
