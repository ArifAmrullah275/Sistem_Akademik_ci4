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
        border-radius: 16px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        background: var(--card-bg); 
        color: var(--text-color); 
        overflow: hidden;
    }

    .card-modern .card-header {
        background: var(--card-bg);
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
    }

    .card-footer {
        background: var(--card-bg) !important;
        border-top: 1px solid var(--border-color);
    }

    .table-custom {
        color: var(--text-color);
        border-color: var(--border-color);
    }

    .table-custom thead th {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
        color: var(--text-muted);
        background-color: var(--hover-bg);
        border-bottom: 1px solid var(--border-color);
        padding: 1rem 1.5rem;
    }

    .table-custom tbody td {
        padding: 1rem 1.5rem;
        vertical-align: middle;
        border-bottom: 1px solid var(--border-color);
        color: var(--text-color);
    }

    .table-custom tbody tr:hover {
        background-color: var(--hover-bg);
        color: var(--text-color);
    }

    .table-custom tbody tr:last-child td {
        border-bottom: none;
    }

    .badge-sks {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: #fff7ed;
        color: #c2410c; 
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.9rem;
        border: 1px solid #ffedd5;
    }

    .icon-mk {
        width: 40px;
        height: 40px;
        background: var(--hover-bg);
        color: var(--telur-asin-primary);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 1rem;
    }

    .btn-primary-custom {
        background: var(--telur-asin-primary);
        color: white;
        border: none;
        box-shadow: 0 4px 10px var(--telur-asin-shadow);
        transition: all 0.2s;
    }

    .btn-primary-custom:hover {
        background: var(--telur-asin-dark);
        color: white;
        transform: translateY(-2px);
    }

    .btn-action {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s;
        color: var(--text-muted); 
        background: var(--hover-bg);
    }

    .btn-action:hover {
        background: var(--telur-asin-primary);
        color: white;
    }

    .btn-action.delete:hover {
        background: #ef4444; 
        color: white;
    }

    .input-group-text, .form-control {
        background-color: var(--input-bg) !important;
        border-color: var(--input-border) !important;
        color: var(--text-color) !important;
    }

    .page-link {
        border: 1px solid var(--border-color) !important;
        border-radius: 12px !important; 
        margin: 0 3px !important;
        line-height: 1.2;
        padding: 0.75rem 1rem !important;
        font-weight: 700 !important;
        font-size: 1rem !important;
        background-color: var(--card-bg) !important;
        color: var(--telur-asin-dark) !important; 
        text-decoration: none !important; 
        transition: all 0.2s !important;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05) !important; 
    }

    .page-link:hover {
        background-color: var(--telur-asin-soft) !important; 
        color: var(--telur-asin-primary) !important;
        border-color: var(--telur-asin-primary) !important;
        box-shadow: 0 4px 12px var(--telur-asin-shadow) !important; 
        transform: translateY(-2px); 
    }

    .page-item.disabled .page-link {
        background-color: var(--hover-bg) !important;
        color: var(--text-muted) !important;
        border-color: var(--border-color) !important;
        box-shadow: none !important;
        transform: none !important;
    }

    .page-item.active .page-link {
        background-color: var(--telur-asin-primary) !important;
        border-color: var(--telur-asin-primary) !important;
        color: white !important;
        font-weight: bold !important;
        box-shadow: 0 5px 20px var(--telur-asin-shadow) !important;
        transform: translateY(-2px) !important;
    }

    .pagination li {
        margin: 0 1px;
    }

    [data-theme="dark"] .page-link:not(.active) {
        color: #ddd !important;
        background-color: var(--card-bg) !important;
        border-color: var(--border-color) !important;
    }
    [data-theme="dark"] .page-link:hover:not(.active) {
        background-color: var(--telur-asin-soft) !important;
    }

    [data-theme="dark"] .text-dark { color: #e0e0e0 !important; }
    [data-theme="dark"] .text-muted { color: #a0a0a0 !important; }
    [data-theme="dark"] .bg-light { background-color: var(--hover-bg) !important; }
    [data-theme="dark"] .bg-white { background-color: var(--card-bg) !important; }

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
            <h3 class="fw-bold mb-0" style="font-family: sans-serif; letter-spacing: -0.5px;">Data Mata Kuliah</h3>
            <p class="text-muted small mb-0">Daftar kurikulum dan mata kuliah aktif</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 px-3 py-2 rounded-pill shadow-sm" style="background-color: var(--card-bg);">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none" style="color: var(--telur-asin-dark);"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mata Kuliah</li>
            </ol>
        </nav>
    </div>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div id="flash-alert" class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert" style="background-color: #dcfce7; color: #166534;">
            <i class="fas fa-check-circle me-2"></i> <strong>Berhasil!</strong> <?= session()->getFlashdata('pesan'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card card-modern">
        <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <h5 class="m-0 fw-bold">
                <i class="fas fa-book-open me-2" style="color: var(--telur-asin-primary);"></i> Daftar Mata Kuliah
            </h5>
            
            <div class="d-flex gap-2">
                <form action="" method="get" class="d-flex">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <span class="input-group-text border-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" name="keyword" class="form-control border-0" placeholder="Cari MK..." value="<?= isset($keyword) ? $keyword : '' ?>">
                        <button class="btn btn-primary-custom btn-sm" type="submit">Cari</button>
                    </div>
                </form>

                <a href="<?= base_url('matakuliah/tambah') ?>" class="btn btn-primary-custom btn-sm rounded-pill px-4 fw-bold d-flex align-items-center">
                    <i class="fas fa-plus me-2"></i> Tambah Data
                </a>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4" width="5%">No</th>
                            <th width="45%">Mata Kuliah</th> <th class="text-center" width="10%">SKS</th>
                            <th width="20%">Ruangan</th>
                            <th class="text-center pe-4" width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($matakuliah)): ?>
                             <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="text-muted opacity-50 mb-2">
                                        <i class="fas fa-box-open fa-3x"></i>
                                    </div>
                                    <h6 class="text-muted">Belum ada data mata kuliah</h6>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php 
                                $page = isset($currentPage) ? $currentPage : 1;
                                $no = 1 + (10 * ($page - 1));
                            ?>
                            <?php foreach ($matakuliah as $row) : ?>
                                <tr>
                                    <td class="ps-4 text-muted fw-bold"><?= $no++; ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="icon-mk">
                                                <i class="fas fa-book"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold"><?= $row['nama_mk']; ?></div>
                                                <div class="small text-muted font-monospace">
                                                    <i class="fas fa-tag me-1 text-warning opacity-75"></i><?= $row['kode_mk']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <span class="badge-sks" title="<?= $row['sks']; ?> SKS">
                                                <?= $row['sks']; ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-muted small">
                                            <i class="fas fa-door-open me-2 text-primary opacity-50"></i> 
                                            <span class="fw-bold"><?= $row['ruangan']; ?></span>
                                        </div>
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?= base_url('matakuliah/edit/' . (isset($row['id_mk']) ? $row['id_mk'] : $row['id'])); ?>" class="btn-action" title="Edit Data">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="<?= base_url('matakuliah/delete/' . (isset($row['id_mk']) ? $row['id_mk'] : $row['id'])); ?>" class="btn-action delete btn-hapus" title="Hapus Data">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card-footer border-top-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <?php if (!empty($matakuliah)) : ?>
                        Menampilkan data <?= 1 + (10 * ($page - 1)) ?> sampai <?= count($matakuliah) + (10 * ($page - 1)) ?>
                    <?php else: ?>
                        Total: 0 Mata Kuliah
                    <?php endif; ?>
                </small>
                
                <div>
                    <?= isset($pager) ? $pager->links('matakuliah', 'default_full') : '' ?>
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
    window.onload = function() {
        var alertBox = document.getElementById('flash-alert');
        if (alertBox) {
            setTimeout(function() { 
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.style.display = 'none', 500);
            }, 3000);
        }
    };

    const buttons = document.querySelectorAll('.btn-hapus');
    buttons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if(typeof Swal !== 'undefined') {
                e.preventDefault();
                const href = this.getAttribute('href');
                Swal.fire({
                    title: 'Hapus Mata Kuliah?',
                    text: "Data tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#06b6d4',
                    cancelButtonColor: '#ef4444',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    background: document.body.getAttribute('data-theme') === 'dark' ? '#1e1e1e' : '#fff',
                    color: document.body.getAttribute('data-theme') === 'dark' ? '#fff' : '#000',
                    borderRadius: '16px'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = href;
                    }
                });
            } else {
                if(!confirm('Yakin ingin menghapus Matakuliah ini?')) {
                    e.preventDefault();
                }
            }
        });
    });

    // --- TAMBAHAN: Script Tombol Bantuan ---
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
            background: document.body.getAttribute('data-theme') === 'dark' ? '#1e1e1e' : '#fff',
            color: document.body.getAttribute('data-theme') === 'dark' ? '#fff' : '#000',
            borderRadius: '16px'
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Data%20Mata%20Kuliah.', '_blank');
            }
        });
    });
</script>
<?php $this->endSection(); ?>