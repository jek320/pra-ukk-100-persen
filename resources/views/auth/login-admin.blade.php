<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            height: 100vh;
        }

        .login-card {
            width: 420px;
            border-radius: 20px;
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            border-radius: 12px;
            padding: 10px 12px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
            border-color: #2563eb;
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
            background-color: #f1f5f9;
        }

        .btn-primary {
            border-radius: 12px;
            font-weight: 600;
            padding: 10px;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }

        .login-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            margin: 0 auto;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
        }

        .login-footer a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="card login-card p-4 border-0">

    <div class="text-center mb-4">
        <div class="login-icon mb-3">
            <i class="bi bi-shield-lock-fill"></i>
        </div>
        <h4 class="fw-bold mb-1">Login Admin</h4>
        <small class="text-muted">Masuk untuk mengakses dashboard</small>
    </div>

    {{-- Alert Error --}}
    @if(session('error'))
        <div class="alert alert-danger text-center rounded-3">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post', ['type' => 'admin']) }}">
        @csrf

        <div class="mb-3">
            <label class="form-label small">Username</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-fill text-secondary"></i>
                </span>
                <input type="text" name="username" class="form-control"
                       placeholder="Masukkan username" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label small">Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-lock-fill text-secondary"></i>
                </span>
                <input type="password" name="password" id="password"
                       class="form-control"
                       placeholder="Masukkan password" required>

                <span class="input-group-text" style="cursor:pointer;" onclick="togglePassword()">
                    <i class="bi bi-eye-fill" id="toggleIcon"></i>
                </span>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-box-arrow-in-right"></i> Login
        </button>
    </form>

    <div class="text-center mt-4 login-footer">
        <small class="text-muted">
            Login sebagai siswa?
            <a href="{{ route('login.siswa') }}">
                Klik disini
            </a>
        </small>
    </div>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');

        if (password.type === "password") {
            password.type = "text";
            icon.classList.remove("bi-eye-fill");
            icon.classList.add("bi-eye-slash-fill");
        } else {
            password.type = "password";
            icon.classList.remove("bi-eye-slash-fill");
            icon.classList.add("bi-eye-fill");
        }
    }
</script>

</body>
</html>