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

    .welcome-banner {
        background: linear-gradient(135deg, var(--telur-asin-dark), var(--telur-asin-primary));
        color: white;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px var(--telur-asin-shadow);
    }

    .welcome-banner::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -5%;
        width: 250px;
        height: 250px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        bottom: -50%;
        right: 15%;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .stats-card {
        background: var(--card-bg);
        color: var(--text-color);
        border: none;
        border-radius: 16px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .stats-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 5px;
        background: var(--telur-asin-primary);
        border-radius: 4px 0 0 4px;
    }

    .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .card-modern {
        border: none;
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        overflow: hidden;
        background: var(--card-bg);
        color: var(--text-color);
    }

    .card-modern .card-header {
        background: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
        padding: 1.25rem;
    }

    .table {
        color: var(--text-color);
        border-color: var(--border-color);
    }

    .table-hover tbody tr:hover {
        background-color: var(--hover-bg);
        color: var(--text-color);
    }

    .bg-light {
        background-color: var(--hover-bg) !important;
        color: var(--text-muted) !important;
    }

    .badge-modern {
        padding: 0.5em 1em;
        border-radius: 50rem;
        font-weight: 500;
        font-size: 0.75rem;
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

    [data-theme="dark"] .text-dark { color: #e0e0e0 !important; }
    [data-theme="dark"] .text-muted { color: #a0a0a0 !important; }
</style>

<div class="container-fluid px-4 pb-5">
    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <div>
            <h3 class="fw-bold mb-0" style="font-family: sans-serif; letter-spacing: -0.5px;">Dashboard</h3>
            <p class="text-muted small mb-0">Overview Sistem Akademik</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 px-3 py-2 rounded-pill shadow-sm" style="background-color: var(--card-bg);">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none" style="color: var(--telur-asin-dark);"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>

    <div class="welcome-banner p-4 mb-5">
        <div class="d-flex align-items-center justify-content-between position-relative" style="z-index: 2;">
            <div>
                <h2 class="fw-bold mb-1">Selamat Datang, <?= session()->get('nama_lengkap'); ?>! 👋</h2>
                <p class="mb-0 opacity-75">Semoga harimu menyenangkan. Berikut adalah ringkasan data akademik hari ini.</p>
            </div>
            <div class="d-none d-md-block me-4">
                <i class="fas fa-university fa-3x opacity-50"></i>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card stats-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase">Mahasiswa</p>
                        <h2 class="fw-bold mb-0"><?= $jumlah_mhs; ?></h2>
                    </div>
                    <div class="icon-box" style="background-color: var(--telur-asin-soft); color: var(--telur-asin-dark);">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="<?= base_url('mahasiswa') ?>" class="text-decoration-none small" style="color: var(--telur-asin-primary);">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card stats-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase">Mata Kuliah</p>
                        <h2 class="fw-bold mb-0"><?= $jumlah_mk; ?></h2>
                    </div>
                    <div class="icon-box" style="background-color: #fff7ed; color: #ea580c;"> 
                        <i class="fas fa-book"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="<?= base_url('matakuliah') ?>" class="text-decoration-none small text-warning">Lihat Detail <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card stats-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase">Hari Ini</p>
                        <h5 class="fw-bold mb-0"><?= date('d M Y'); ?></h5>
                    </div>
                    <div class="icon-box" style="background-color: #fce7f3; color: #db2777;"> 
                        <i class="fas fa-calendar-day"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="badge bg-light text-secondary border">Semester Ganjil</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card stats-card h-100 p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-muted mb-1 small fw-bold text-uppercase">Status Akun</p>
                        <h5 class="fw-bold text-success mb-0">Aktif</h5>
                    </div>
                    <div class="icon-box" style="background-color: #dcfce7; color: #16a34a;"> 
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="<?= base_url('biodata') ?>" class="text-decoration-none small text-success">Edit Profil <i class="fas fa-edit ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

<div class="row g-4">
        <div class="col-xl-6 col-lg-12">
            <div class="card card-modern h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold" style="color: var(--telur-asin-dark);">
                        <i class="fas fa-users me-2"></i> Mahasiswa Terbaru
                    </h6>
                    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-sm rounded-pill px-3 text-white" style="background: var(--telur-asin-primary);">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th class="ps-4">Nama</th>
                                    <th>NPM</th>
                                    <th>No HP</th>
                                    <th class="text-center pe-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($mahasiswa_terbaru)): ?>
                                    <tr><td colspan="4" class="text-center py-5 text-muted">Data Kosong</td></tr>
                                <?php else: ?>
                                    <?php foreach($mahasiswa_terbaru as $mhs): ?>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="fw-bold"><?= $mhs['nama']; ?></div>
                                            <small class="text-muted"><?= $mhs['alamat']; ?></small>
                                        </td>
                                        <td class="text-primary fw-bold"><?= $mhs['nim']; ?></td>
                                        <td class="text-muted small"><?= $mhs['no_hp']; ?></td>
                                        <td class="text-center pe-4">
                                            <span class="badge badge-modern" style="background: var(--telur-asin-soft); color: var(--telur-asin-dark); border: 1px solid var(--telur-asin-light);">Aktif</span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12">
            <div class="card card-modern h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold" style="color: var(--telur-asin-dark);">
                        <i class="fas fa-book me-2"></i> Mata Kuliah
                    </h6>
                    <a href="<?= base_url('matakuliah') ?>" class="btn btn-sm rounded-pill px-3 text-white" style="background: var(--telur-asin-primary);">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th class="ps-4">Mata Kuliah</th>
                                    <th class="text-center">SKS</th>
                                    <th class="text-center">Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($data_matakuliah)): ?>
                                    <tr><td colspan="3" class="text-center py-5 text-muted">Data Kosong</td></tr>
                                <?php else: ?>
                                    <?php foreach($data_matakuliah as $mk): ?>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="fw-bold"><?= $mk['nama_mk']; ?></div>
                                            <small class="text-muted text-uppercase" style="font-size: 10px;"><?= $mk['kode_mk']; ?></small>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                  style="width: 28px; height: 28px; background-color: var(--telur-asin-dark); color: white;">
                                                <?= $mk['sks']; ?>
                                            </span>
                                        </td>
                                        <td class="text-center small text-muted fw-bold"><?= $mk['ruangan']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="text-center py-4 text-muted small mt-4">
        Dibuat dengan cinta ❤️ oleh <strong>Mas Arif Amrullah</strong>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-4" style="z-index: 100">
    <button id="btn-bantuan" class="btn btn-float-custom text-white rounded-pill shadow-lg px-4 py-2 d-flex align-items-center gap-2">
        <i class="fas fa-headset fa-lg"></i> 
        <span class="fw-bold">Bantuan</span>
    </button>
</div>

<script>
    document.getElementById('btn-bantuan').addEventListener('click', function() {
        Swal.fire({
            title: 'Butuh Bantuan?',
            html: 'Jika Anda mengalami kendala teknis atau akademik,<br>silakan hubungi Administrator.',
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
                window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Sistem Akademik.', '_blank');
            }
        });
    });
</script>
<?php $this->endSection(); ?>