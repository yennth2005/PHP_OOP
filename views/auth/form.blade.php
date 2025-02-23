<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background Image */
        body {
            background: url('https://i.imgur.com/lA9MDaD.png') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 15px;
            /* Thêm bo viền cho card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            /* Thêm bo viền cho card-body */
        }

        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .nav-tabs .nav-link {
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .nav-tabs .nav-link:hover {
            color: #0056b3;
        }

        .form-control {
            border-radius: 8px;
            /* Bo viền cho input */
            padding: 12px;
            /* Đệm cho input */
            font-size: 1rem;
            /* Kích thước chữ trong input */
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.5);
        }

        h4.card-title {
            font-size: 2rem;
            color: #007bff;
        }

        .container {
            max-width: 600px;
            /* Đặt rộng cho container lớn hơn */
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Login & Register</h4>

                        @include('admin.components.msg-fail')
                        @include('admin.components.msg-success')
                        @include('admin.components.errors')

                        <ul class="nav nav-tabs" id="authTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login"
                                    role="tab" aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register"
                                    role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="authTabsContent">
                            <!-- Login Form -->
                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <form action="/login" method="POST">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $_SESSION['data']['email'] ?? null }}" placeholder="Enter email"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                </form>
                            </div>
                            <!-- Register Form -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="/register" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="name_resgister" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="username" id="name_resgister"
                                            value="{{ $_SESSION['data']['username'] ?? null }}"
                                            placeholder="Enter full name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_resgister" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email_resgister"
                                            value="{{ $_SESSION['data']['email'] ?? null }}" placeholder="Enter email"
                                            required>
                                    </div>
                                    <input type="file" hidden name="avatar" id="avatar_resgister" />
                                    <div class="mb-3">
                                        <label for="password_resgister" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password_resgister"
                                            placeholder="Enter password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password_resgister" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password"
                                            id="confirm_password_resgister" placeholder="Confirm password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
