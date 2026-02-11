<?php $this->extend('template/template'); ?>
<?php $this->section('isi'); ?>

<style>
    :root {
        --telur-asin-dark: #0e7490;
        --telur-asin-primary: #06b6d4;
        --telur-asin-light: #67e8f9;
        --telur-asin-soft: #ecfeff;
        --telur-asin-shadow: rgba(6, 182, 212, 0.25);
    }

    .card-modern {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        overflow: hidden;
        background: var(--card-bg); 
        color: var(--text-color);
    }

    .profile-cover {
        height: 180px;
        background: linear-gradient(135deg, var(--telur-asin-dark), var(--telur-asin-primary));
        position: relative;
    }

    .profile-avatar-container {
        margin-top: -90px; 
        position: relative;
        display: inline-block;
    }

    .profile-avatar {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border: 5px solid var(--card-bg);
        border-radius: 50%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        background: var(--card-bg);
    }

    .btn-upload-icon {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: var(--telur-asin-dark);
        color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid var(--card-bg);
        cursor: pointer;
        transition: transform 0.2s;
    }

    .btn-upload-icon:hover {
        transform: scale(1.1);
        background: var(--telur-asin-primary);
    }

    .form-control[readonly] {
        background-color: var(--hover-bg);
        color: var(--text-color);
        border-color: var(--border-color);
        opacity: 0.8;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-muted);
        font-size: 0.9rem;
    }
    
    .btn-simpan {
        background: var(--telur-asin-primary);
        color: white;
        border: none;
        box-shadow: 0 4px 6px var(--telur-asin-shadow);
    }

    .btn-simpan:hover {
        background: var(--telur-asin-dark);
        color: white;
    }

    .modal-content {
        background-color: var(--card-bg);
        color: var(--text-color);
    }

    .modal-header {
        border-bottom-color: var(--border-color);
    }

    .bg-light {
        background-color: var(--hover-bg) !important;
    }

    .btn-float-custom {
        background: var(--telur-asin-primary);
        border: none;
        transition: transform 0.2s;
    }

    .btn-float-custom:hover {
        background: var(--telur-asin-dark);
        transform: scale(1.05);
    }
</style>

<div class="container-fluid px-4 pb-5">

    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <div>
            <h3 class="fw-bold mb-0" style="font-family: sans-serif; letter-spacing: -0.5px;">Biodata Diri</h3>
            <p class="text-muted small mb-0">Kelola informasi profil akun Anda</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 px-3 py-2 rounded-pill shadow-sm" style="background-color: var(--card-bg);">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none" style="color: var(--telur-asin-dark);"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Biodata</li>
            </ol>
        </nav>
    </div>

    <?php if(session()->getFlashdata('pesan')): ?>
        <div id="alert-sukses" class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="background-color: #dcfce7; color: #166534;">
            <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error_pass') || $validation->hasError('foto')): ?>
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> 
            <?= session()->getFlashdata('error_pass'); ?>
            <?= $validation->getError('foto'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>


    <div class="card card-modern">
        <div class="profile-cover"></div>
        <div class="card-body pt-0 px-4 pb-4">
            <form action="<?= base_url('biodata/update_profile') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="foto_lama" value="<?= $user['foto']; ?>">

                <div class="row">
                    <div class="col-lg-4 text-center">
                        <div class="profile-avatar-container mb-3">
                            <img src="<?= base_url('img/' . ($user['foto'] ? $user['foto'] : 'default.png')) ?>" 
                                 class="profile-avatar img-preview" 
                                 alt="Foto Profil">
                            
                            <label for="foto" class="btn-upload-icon shadow-sm" title="Ganti Foto">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input class="d-none" type="file" id="foto" name="foto" onchange="previewImg()">
                        </div>
                        
                        <h5 class="fw-bold mb-1"><?= $user['nama_lengkap']; ?></h5>
                        <p class="text-muted small mb-3">Administrator / Mahasiswa</p>
                        
                        <div class="d-grid gap-2 px-lg-4 mb-4 mb-lg-0">
                            <button type="button" class="btn btn-outline-warning rounded-pill fw-bold" data-bs-toggle="modal" data-bs-target="#modalPass">
                                <i class="fas fa-key me-2"></i> Ganti Password
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-8 pt-lg-4">
                        <div class="ps-lg-4">
                            <h5 class="fw-bold mb-4" style="color: var(--telur-asin-dark);">
                                <i class="fas fa-user-circle me-2"></i> Informasi Akun
                            </h5>

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0" style="background-color: var(--hover-bg);"><i class="fas fa-id-badge text-muted"></i></span>
                                        <input type="text" class="form-control border-0" value="<?= $user['username']; ?>" readonly style="background-color: var(--hover-bg);">
                                    </div>
                                    <div class="form-text text-muted" style="font-size: 0.8rem;">
                                        <i class="fas fa-info-circle me-1"></i> Username tidak dapat diubah demi keamanan.
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control p-3 border rounded-3" value="<?= $user['nama_lengkap']; ?>" required placeholder="Masukkan nama lengkap Anda">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <input type="text" class="form-control" value="Aktif" readonly style="background-color: #dcfce7; color: #166534; border:none;">
                                </div>
                            </div>

                            <div class="mt-5 text-end">
                                <button type="submit" class="btn btn-simpan rounded-pill px-5 py-2 fw-bold">
                                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center py-4 text-muted small mt-4">
        Dibuat dengan cinta ❤️ oleh <strong>Mas Arif Amrullah</strong>
    </div>
</div>

<div class="modal fade" id="modalPass" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
      <div class="modal-header border-0 rounded-top-16" style="background-color: var(--hover-bg);">
        <h5 class="modal-title fw-bold"><i class="fas fa-lock me-2 text-warning"></i> Ganti Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="<?= base_url('biodata/update_password') ?>" method="post">
          <div class="modal-body p-4">
              <?= csrf_field(); ?>
              <div class="mb-3">
                  <label class="form-label text-muted small text-uppercase fw-bold">Password Lama</label>
                  <input type="password" name="pass_lama" class="form-control rounded-3" required placeholder="******">
              </div>
              <div class="mb-3">
                  <label class="form-label text-muted small text-uppercase fw-bold">Password Baru</label>
                  <input type="password" name="pass_baru" class="form-control rounded-3" required placeholder="******">
              </div>
              <div class="mb-3">
                  <label class="form-label text-muted small text-uppercase fw-bold">Ulangi Password Baru</label>
                  <input type="password" name="pass_konf" class="form-control rounded-3" required placeholder="******">
              </div>
          </div>
          <div class="modal-footer border-0 pt-0 px-4 pb-4">
            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-warning text-white rounded-pill px-4 shadow-sm fw-bold">Simpan Password</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="position-fixed bottom-0 end-0 p-4" style="z-index: 100">
    <button id="btn-bantuan" class="btn btn-float-custom text-white rounded-pill shadow-lg px-4 py-2 d-flex align-items-center gap-2">
        <i class="fas fa-headset fa-lg"></i> 
        <span class="fw-bold">Bantuan</span>
    </button>
</div>

<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        
        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);
        
        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }

    // --- Script Auto Hide Alert ---
    window.addEventListener('load', function() {
        const alertSukses = document.getElementById('alert-sukses');
        if (alertSukses) {
            setTimeout(function() {
                alertSukses.style.transition = 'opacity 0.5s ease';
                alertSukses.style.opacity = '0';
                setTimeout(function() {
                    alertSukses.style.display = 'none';
                }, 500); 
            }, 3000); 
        }
    });

    document.getElementById('btn-bantuan').addEventListener('click', function() {
        Swal.fire({
            title: 'Butuh Bantuan?',
            html: 'Jika Anda mengalami kendala teknis atau pengisian data,<br>silakan hubungi Administrator.',
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
                window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Biodata%20Sistem Akademik.', '_blank');
            }
        });
    });
</script>
<?php $this->endSection(); ?>