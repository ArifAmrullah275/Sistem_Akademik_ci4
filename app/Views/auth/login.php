<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url('img/bg_login.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(5px);
            padding: 40px;
            border-radius: 20px; 
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08); 
            width: 100%;
            max-width: 420px; 
            text-align: center;
            position: relative; 
            z-index: 10; 
        }

        .login-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            font-size: 1.5rem;
        }

        .form-label {
            text-align: left;
            display: block;
            font-weight: 600;
            font-size: 0.9rem;
            color: #4b5563;
            margin-bottom: 8px;
        }

        .form-control {
            background-color: #eff6ff; 
            border: 1px solid #dbeafe;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.95rem;
            color: #333;
        }
        .form-control:focus {
            background-color: white;
            border-color: #3b82f6; 
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .input-group-text {
            background-color: #eff6ff;
            border: 1px solid #dbeafe;
            border-left: none;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            color: #6b7280;
        }
        .input-with-icon {
            border-right: none;
            border-radius: 8px 0 0 8px;
        }

        .btn-signin {
            background-color: #4f46e5; 
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 12px;
            width: 100%;
            margin-top: 20px;
            transition: background 0.3s;
        }
        .btn-signin:hover {
            background-color: #4338ca;
        }

        .bottom-links {
            margin-top: 20px;
            font-size: 0.85rem;
            color: #6b7280;
        }
        .bottom-links a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 600;
        }
        .bottom-links a:hover {
            text-decoration: underline;
        }

        .copyright {
            margin-top: 30px;
            font-size: 0.75rem;
            color: #9ca3af;
        }

        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }

        .help-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
        .btn-float-custom {
            background: #06b6d4; 
            border: none;
            transition: transform 0.2s;
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.4);
        }
        .btn-float-custom:hover {
            background: #0e7490;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h4 class="login-title">Login Sistem Akademik</h4>

        <?php if(session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger py-2 text-start small">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('pesan')): ?>
            <div id="alert-sukses" class="alert alert-success py-2 text-start small">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login/process') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus value="<?= old('username') ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control input-with-icon" placeholder="••••••••" required>
                    <span class="input-group-text" onclick="togglePassword()">
                        <i class="far fa-eye" id="toggleIcon"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn-signin">Sign in</button>
            
            <div class="bottom-links text-start d-flex justify-content-between">
                <a href="#">Lupa Password?</a>
                <span>
                    Belum punya akun? <a href="<?= base_url('register') ?>">Daftar</a>
                </span>
            </div>

            <div class="copyright">
                copyright @MasArifAmrullah<?= date('Y'); ?>
            </div>
        </form>
    </div>

    <div class="help-container">
        <button id="btn-bantuan" class="btn btn-float-custom text-white rounded-pill px-4 py-2 d-flex align-items-center gap-2">
            <i class="fas fa-headset fa-lg"></i> 
            <span class="fw-bold">Bantuan</span>
        </button>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var icon = document.getElementById("toggleIcon");
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        window.onload = function() {
            var successAlert = document.getElementById('alert-sukses');
            if (successAlert) {
                setTimeout(function() {
                    successAlert.classList.add('fade-out');
                    setTimeout(function() {
                        successAlert.style.display = 'none';
                    }, 500);
                }, 5000);
            }
        };
        
        document.getElementById('btn-bantuan').addEventListener('click', function() {
            Swal.fire({
                heightAuto: false, 
                title: 'Butuh Bantuan?',
                html: 'Jika Anda mengalami kendala saat login,<br>silakan hubungi Administrator.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#25D366', 
                cancelButtonColor: '#64748b',  
                confirmButtonText: '<i class="fab fa-whatsapp"></i> Hubungi Admin',
                cancelButtonText: 'Tutup',
                reverseButtons: true,
                background: '#fff',
                borderRadius: '16px',
                customClass: {
                    container: 'my-swal'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Login%20Sistem Akademik.', '_blank');
                }
            });
        });
    </script>

</body>
</html>