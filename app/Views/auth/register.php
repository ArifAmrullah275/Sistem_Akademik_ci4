<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url('img/bg_regist.jpg') ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh; 
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            width: 100%;
            max-width: 500px; 
            text-align: center;
        }

        .register-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
            font-size: 1.5rem;
        }
        .register-subtitle {
            color: #4b5563;
            font-size: 0.85rem;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .form-label {
            text-align: left;
            display: block;
            font-weight: 600;
            font-size: 0.85rem;
            color: #4b5563;
            margin-bottom: 6px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.95rem;
            color: #333;
        }
        .form-control:focus {
            background-color: white;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .input-group-text {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #d1d5db;
            border-left: none;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            color: #6b7280;
        }
        .input-with-icon {
            border-right: none;
            border-radius: 8px 0 0 8px;
        }

        .btn-register {
            background-color: #4f46e5;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 12px;
            width: 100%;
            margin-top: 15px;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.3);
        }
        .btn-register:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(79, 70, 229, 0.4);
        }

        .login-link {
            display: block;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #4b5563;
            font-weight: 500;
        }
        .login-link a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 700;
        }
        .login-link a:hover {
            text-decoration: underline;
        }

        .copyright {
            margin-top: 30px;
            font-size: 0.75rem;
            color: #6b7280;
        }
        
        .form-text {
            text-align: left;
            font-size: 0.75rem;
            color: #6b7280;
        }

        /* Style Tombol Bantuan */
        .btn-float-custom {
            background: #06b6d4;
            border: none;
            transition: transform 0.2s;
        }
        .btn-float-custom:hover {
            background: #0e7490;
            transform: scale(1.05);
        }

        /* Animasi Alert */
        .fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }
        
        /* List Error */
        .alert ul {
            margin-bottom: 0;
            padding-left: 1.2rem;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="register-card">
        <h4 class="register-title">Buat Akun Baru</h4>
        <p class="register-subtitle">Lengkapi data diri untuk bergabung di Sistem Akademik</p>

        <div id="alert-area">
            <?php if(isset($validation) && $validation->getErrors()): ?>
                <div id="alert-validasi" class="alert alert-danger py-2 text-start small border-0 shadow-sm" style="background-color: rgba(254, 226, 226, 0.95); color: #b91c1c;">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
        </div>

        <form id="form-register" action="<?= base_url('register/process') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Contoh: aarrmuuhh" value="<?= old('username') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="<?= old('nama_lengkap') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="pass1" class="form-control input-with-icon" placeholder="Buat password kuat" required minlength="6">
                    <span class="input-group-text" onclick="togglePass('pass1', 'icon1')">
                        <i class="far fa-eye" id="icon1"></i>
                    </span>
                </div>
                <div class="form-text">Minimal 6 karakter kombinasi huruf dan angka.</div>
            </div>

            <div class="mb-4">
                <label class="form-label">Ulangi Password</label>
                <div class="input-group">
                    <input type="password" name="password_conf" id="pass2" class="form-control input-with-icon" placeholder="Ketik ulang password" required minlength="6">
                    <span class="input-group-text" onclick="togglePass('pass2', 'icon2')">
                        <i class="far fa-eye" id="icon2"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn-register">Daftar Sekarang</button>
            
            <div class="login-link">
                Sudah punya akun? <a href="<?= base_url('login') ?>">Login disini</a>
            </div>

            <div class="copyright">
                copyright @MasArifAmrullah<?= date('Y'); ?>
            </div>
        </form>
    </div>

    <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 100">
        <button id="btn-bantuan" class="btn btn-float-custom text-white rounded-pill shadow-lg px-4 py-2 d-flex align-items-center gap-2">
            <i class="fas fa-headset fa-lg"></i> 
            <span class="fw-bold">Bantuan</span>
        </button>
    </div>

    <script>
        function togglePass(inputId, iconId) {
            var passwordInput = document.getElementById(inputId);
            var icon = document.getElementById(iconId);
            
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

        // --- VALIDASI PASSWORD (JAVASCRIPT) ---
        document.getElementById('form-register').addEventListener('submit', function(e) {
            var pass1 = document.getElementById('pass1').value;
            var pass2 = document.getElementById('pass2').value;
            var alertArea = document.getElementById('alert-area');

            // Cek jika password tidak sama
            if (pass1 !== pass2) {
                e.preventDefault();
                
                alertArea.innerHTML = `
                    <div id="alert-js" class="alert alert-danger py-2 text-start small border-0 shadow-sm" style="background-color: rgba(254, 226, 226, 0.95); color: #b91c1c;">
                        <ul class="mb-0 ps-3">
                            <li>Konfirmasi password tidak sesuai.</li>
                        </ul>
                    </div>
                `;

                setTimeout(function() {
                    var alertJs = document.getElementById('alert-js');
                    if(alertJs) {
                        alertJs.classList.add('fade-out');
                        setTimeout(() => alertJs.remove(), 500);
                    }
                }, 3000);
            }
        });

        // --- SCRIPT AUTO HIDE ALERT PHP ---
        window.onload = function() {
            var validationAlert = document.getElementById('alert-validasi');
            if (validationAlert) {
                setTimeout(function() {
                    validationAlert.classList.add('fade-out'); 
                    setTimeout(function() {
                        validationAlert.style.display = 'none'; 
                    }, 500);
                }, 5000); 
            }
        };

        // --- SCRIPT TOMBOL BANTUAN ---
        document.getElementById('btn-bantuan').addEventListener('click', function() {
            Swal.fire({
                title: 'Butuh Bantuan?',
                html: 'Jika Anda mengalami kendala saat registrasi,<br>silakan hubungi Administrator.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#25D366', 
                cancelButtonColor: '#64748b', 
                confirmButtonText: '<i class="fab fa-whatsapp"></i> Hubungi Admin',
                cancelButtonText: 'Tutup',
                reverseButtons: true,
                background: '#fff',
                borderRadius: '16px'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Registrasi%20Sistem%20Akademik.', '_blank');
                }
            });
        });
    </script>

</body>
</html>