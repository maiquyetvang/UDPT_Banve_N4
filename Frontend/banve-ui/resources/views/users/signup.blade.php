<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Link to MDB CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.8.0/mdb.min.css" rel="stylesheet">
    <!-- Link to Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .form-outline {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-outline input.form-control, .form-outline select.form-control {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: .375rem .75rem;
        }

        .form-outline input.form-control:focus, .form-outline select.form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25);
        }

        .form-outline .form-label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 1rem;
            transition: .2s ease-out;
            font-size: 1rem;
            padding: 0 .25rem;
            background-color: #fff;
            pointer-events: none;
        }

        .form-outline .form-control:focus ~ .form-label,
        .form-outline .form-control:not(:placeholder-shown) ~ .form-label,
        .form-outline select.form-control:focus ~ .form-label,
        .form-outline select.form-control:not(:placeholder-shown) ~ .form-label {
            top: 0;
            transform: translateY(-100%);
            left: .75rem;
            font-size: .75rem;
            background-color: #f8f9fa;
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            cursor: pointer;
        }

        #error-message {
            color: red;
            margin-top: .25rem;
            display: none;
        }

        .form-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-column {
            flex: 0 0 48%;
        }

        /* Custom style for Back button */
        .btn-back {
            background-color: #d3d3d3; /* Light gray color */
            color: #000;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-back:hover {
            background-color: #a9a9a9; /* Darker gray color on hover */
        }
    </style>
</head>
<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign Up</h3>

                            <form id="signup-form">
                                <div class="form-container">
                                    <div class="form-column">
                                        <div class="form-outline mb-4">
                                            <input type="text" id="username" name="username" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="username">Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="email">Email</label>
                                        </div>
        
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="password">Password</label>
                                            <i class="fas fa-eye password-toggle" id="toggle-password"></i>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="re-password" name="re_password" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="re-password">Re-enter Password</label>
                                            <i class="fas fa-eye password-toggle" id="toggle-re-password"></i>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="first-name" name="firstName" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="first-name">First Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="last-name" name="lastName" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="last-name">Last Name</label>
                                        </div>
                                    </div>

                                    <div class="form-column">
                                        <div class="form-outline mb-4">
                                            <select id="gender" name="gender" class="form-control form-control-lg" required>
                                                <option value="" disabled selected>Choose gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label class="form-label" for="gender">Gender</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="phone-number" name="phoneNumber" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="phone-number">Phone Number</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="date" id="date-of-birth" name="dateOfBirth" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="date-of-birth">Date of Birth</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="street" name="street" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="street">Street</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="district" name="district" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="district">District</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="province" name="province" class="form-control form-control-lg"
                                                required>
                                            <label class="form-label" for="province">Province</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>

                                <!-- Back button -->
                                <button type="button" class="btn btn-back btn-lg btn-block" onclick="window.history.back();">Back</button>

                                <div id="error-message"></div>
                            </form>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Link to MDB JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.8.0/mdb.min.js"></script>
    <!-- Custom JavaScript for Form Validation and Toggle Password Visibility -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('signup-form');
            const usernameInput = document.getElementById('username');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const rePasswordInput = document.getElementById('re-password');
            const firstNameInput = document.getElementById('first-name');
            const lastNameInput = document.getElementById('last-name');
            const genderInput = document.getElementById('gender');
            const phoneNumberInput = document.getElementById('phone-number');
            const dateOfBirthInput = document.getElementById('date-of-birth');
            const streetInput = document.getElementById('street');
            const districtInput = document.getElementById('district');
            const provinceInput = document.getElementById('province');
            const errorMessage = document.getElementById('error-message');
            const togglePassword = document.getElementById('toggle-password');
            const toggleRePassword = document.getElementById('toggle-re-password');

            form.addEventListener('submit', function(event) {
                // Reset error message
                errorMessage.innerText = '';
                errorMessage.style.display = 'none';

                // Kiểm tra các trường không để trống
                const inputs = [
                    usernameInput, emailInput, passwordInput, rePasswordInput, 
                    firstNameInput, lastNameInput, genderInput, phoneNumberInput, 
                    dateOfBirthInput, streetInput, districtInput, provinceInput
                ];
                for (const input of inputs) {
                    if (input.value.trim() === '') {
                        errorMessage.innerText = 'All fields are required';
                        errorMessage.style.display = 'block';
                        setTimeout(() => errorMessage.style.display = 'none', 3000);
                        event.preventDefault();
                        return;
                    }
                }

                // Kiểm tra định dạng email
                if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(emailInput.value)) {
                    errorMessage.innerText = 'Invalid email address';
                    errorMessage.style.display = 'block';
                    setTimeout(() => errorMessage.style.display = 'none', 3000);
                    event.preventDefault();
                    return;
                }

                // Kiểm tra password và re-password trùng nhau
                if (passwordInput.value !== rePasswordInput.value) {
                    errorMessage.innerText = 'Passwords do not match';
                    errorMessage.style.display = 'block';
                    setTimeout(() => errorMessage.style.display = 'none', 3000);
                    event.preventDefault();
                    return;
                }

                // Nếu validate thành công, có thể submit form
            });

            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            toggleRePassword.addEventListener('click', function() {
                const type = rePasswordInput.type === 'password' ? 'text' : 'password';
                rePasswordInput.type = type;
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>
