<?php $this->extend('template/template'); ?>
<?php $this->section('isi'); ?>

<style>
    :root {
        --telur-asin-primary: #06b6d4;
        --telur-asin-dark: #0e7490;
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

    .btn-update-custom {
        background-color: var(--telur-asin-primary);
        color: white;
        border: none;
        box-shadow: 0 4px 10px var(--telur-asin-shadow);
        transition: all 0.2s;
    }

    .btn-update-custom:hover {
        background-color: var(--telur-asin-dark);
        color: white;
        transform: translateY(-2px);
    }

    .form-label {
        font-weight: 600;
        color: var(--text-muted); 
    }

    .form-control.is-invalid {
        background-color: var(--input-bg);
        border-color: #dc3545 !important;
        color: var(--text-color);
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
    <div class="card mt-3 card-modern">
        <div class="card-header border-bottom">
            <h5 class="fw-bold mb-0"><?= $title ?></h5>
        </div>
        <div class="card-body p-4">
            <form class="row g-3" action="<?= base_url('mahasiswa/update') ?>" method="post">
                
                <?= csrf_field(); ?>

                <div class="col-md-6">
                    <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                    <label class="form-label">NPM</label>
                    <input type="text" name="nim" 
                           class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" 
                           value="<?= (old('nim')) ? old('nim') : $mahasiswa['nim']; ?>"
                           required>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nim'); ?>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" 
                           class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" 
                           value="<?= (old('nama')) ? old('nama') : $mahasiswa['nama']; ?>"
                           required>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" 
                           class="form-control" 
                           value="<?= (old('alamat')) ? old('alamat') : $mahasiswa['alamat']; ?>"
                           required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label">Handphone</label>
                    <input type="text" name="no_hp" 
                           class="form-control" 
                           value="<?= (old('no_hp')) ? old('no_hp') : $mahasiswa['no_hp']; ?>"
                           required>
                </div>
                
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-update-custom px-4">Update</button>
                    
                    <button type="reset" class="btn btn-danger px-4">Batal</button>
                    
                    <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
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
    // --- SCRIPT TOMBOL BANTUAN ---
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btn-bantuan').addEventListener('click', function() {
            if (typeof Swal !== 'undefined') {
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
                    background: document.body.getAttribute('data-theme') === 'dark' ? '#1e1e1e' : '#fff',
                    color: document.body.getAttribute('data-theme') === 'dark' ? '#fff' : '#000',
                    borderRadius: '16px'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Edit%20Data%20Mahasiswa.', '_blank');
                    }
                });
            } else {
                alert('Silakan hubungi admin di 083827914570');
            }
        });
    });
</script>
<?php $this->endSection(); ?>