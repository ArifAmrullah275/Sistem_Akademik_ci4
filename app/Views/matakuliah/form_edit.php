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
            
            <form action="<?= base_url('matakuliah/update') ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_mk" value="<?= $matakuliah['id_mk']; ?>">

                <div class="mb-3">
                    <label class="form-label">Kode MK</label>
                    <input type="text" name="kode_mk" 
                           class="form-control <?= (isset($validation) && $validation->hasError('kode_mk')) ? 'is-invalid' : ''; ?>" 
                           value="<?= (old('kode_mk')) ? old('kode_mk') : $matakuliah['kode_mk']; ?>"
                           required>
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('kode_mk') : '' ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" 
                           class="form-control <?= (isset($validation) && $validation->hasError('nama_mk')) ? 'is-invalid' : ''; ?>" 
                           value="<?= (old('nama_mk')) ? old('nama_mk') : $matakuliah['nama_mk']; ?>"
                           required>
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('nama_mk') : '' ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">SKS</label>
                    <input type="text" name="sks" 
                           class="form-control <?= (isset($validation) && $validation->hasError('sks')) ? 'is-invalid' : ''; ?>" 
                           value="<?= (old('sks')) ? old('sks') : $matakuliah['sks']; ?>"
                           required>
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('sks') : '' ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ruangan</label>
                    <input type="text" name="ruangan" 
                           class="form-control <?= (isset($validation) && $validation->hasError('ruangan')) ? 'is-invalid' : ''; ?>" 
                           value="<?= (old('ruangan')) ? old('ruangan') : $matakuliah['ruangan']; ?>"
                           required>
                    <div class="invalid-feedback">
                        <?= isset($validation) ? $validation->getError('ruangan') : '' ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-update-custom px-4">Update</button>
                <button type="reset" class="btn btn-danger px-4">Batal</button>
                <a href="<?= base_url('matakuliah'); ?>" class="btn btn-secondary px-4">Kembali</a>

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
                        window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Edit%20Data%20Mata%20Kuliah.', '_blank');
                    }
                });
            } else {
                alert('Silakan hubungi admin di 083827914570');
            }
        });
    });
</script>
<?php $this->endSection(); ?>