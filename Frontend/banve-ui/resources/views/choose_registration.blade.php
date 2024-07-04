<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bạn muốn đăng ký làm?</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .choice-box {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
            background-color: #007bff;
            color: #fff;
            flex: 1;
            margin: 10px;
        }
        .choice-box:hover {
            background-color: #0056b3;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        @media (min-width: 768px) {
            .btn-container {
                flex-direction: row;
            }
        }
        .back-btn {
            border: 2px solid #6c757d;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
            background-color: #6c757d;
            color: #fff;
            width: 50%;
            margin: 20px auto 0;
        }
        .back-btn:hover {
            background-color: #5a6268;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center w-100">
            <div class="title">
                <h3>Bạn muốn đăng ký làm?</h3>
            </div>
            <div class="btn-container">
                <div class="choice-box" onclick="location.href='{{ route('user.signup') }}'">
                    <h4>Khách hàng</h4>
                </div>
                <div class="choice-box" onclick="location.href='{{ route('eadmin.signup') }}'">
                    <h4>Nhà tổ chức sự kiện</h4>
                </div>
            </div>
            <button class="back-btn" onclick="history.back()">Quay lại</button>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
