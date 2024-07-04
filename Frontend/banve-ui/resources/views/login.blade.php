<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .form-outline input.form-control {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: .375rem .75rem;
        }

        .form-outline input.form-control:focus {
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
        .form-outline .form-control:not(:placeholder-shown) ~ .form-label {
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
        /* Custom icon size for home */
    .fa-home {
        font-size: 1.5rem; /* Adjust the font-size as needed */
        margin-right: 0.5rem; /* Optional: Add some spacing */
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
                            <a href="{{ route('home.index') }}" class="btn btn-link text-dark"><i class="fas fa-home"></i></a>

                            <h3 class="mb-5">Sign in</h3>

                            @if(session('error'))
                                <div class="alert alert-danger" role="alert" id="session-error">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form id="login-form" method="POST" action="{{ route('login.post') }}">
                                @csrf {{-- Laravel CSRF token --}}
                                
                                <div class="form-outline mb-4">
                                    <input type="username" id="username" name="username" class="form-control form-control-lg"
                                        required>
                                    <label class="form-label" for="username">Username or email</label>
                                </div>
    
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                                        required>
                                    <label class="form-label" for="password">Password</label>
                                    <i class="fas fa-eye password-toggle" id="toggle-password"></i>
                                </div>
    
                               
    
                                <div class="mb-4">
                                    <span>Don't have an account? <a href="{{ route('choose.registration') }}">Sign Up</a></span>
                                </div>
    
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
    
                                <hr class="my-4">
    
                                <button type="button" class="btn btn-lg btn-block btn-primary" id="google-btn" style="background-color: #dd4b39;">
                                    <i class="fab fa-google me-2"></i> Sign in with Google
                                </button>
                                <button type="button" class="btn btn-lg btn-block btn-primary mb-2" id="facebook-btn" style="background-color: #3b5998;">
                                    <i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
                                </button>

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
            const form = document.getElementById('login-form');
            const usernameInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');
            const rePasswordInput = document.getElementById('repassword');
            const errorMessage = document.getElementById('error-message');
            const sessionError = document.getElementById('session-error');
            const togglePassword = document.getElementById('toggle-password');
            

            form.addEventListener('submit', function(event) {
                // Kiểm tra không để trống
                if (usernameInput.value.trim() === '' || passwordInput.value.trim() === '') {
                    errorMessage.innerText = 'username and Password cannot be empty';
                    errorMessage.style.display = 'block';
                    setTimeout(() => errorMessage.style.display = 'none', 3000);
                    event.preventDefault();
                    return;
                }

               
                // Kiểm tra độ dài của username
                if (usernameInput.value.length < 4) {
                    errorMessage.innerText = 'Username must be at least 4 characters long';
                    errorMessage.style.display = 'block';
                    setTimeout(() => errorMessage.style.display = 'none', 3000);
                    event.preventDefault();
                    return;
                }

                // Kiểm tra độ dài của mật khẩu
                if (passwordInput.value.length < 6) {
                    errorMessage.innerText = 'Password must be at least 6 characters long';
                    errorMessage.style.display = 'block';
                    setTimeout(() => errorMessage.style.display = 'none', 3000);
                    event.preventDefault();
                    return;
                }

                // Nếu validate thành công, có thể submit form
            });

            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

          
            // Nếu có lỗi từ session, ẩn nó sau 3 giây
            if (sessionError) {
                setTimeout(() => sessionError.style.display = 'none', 3000);
            }
        });

    </script>
</body>
</html>
