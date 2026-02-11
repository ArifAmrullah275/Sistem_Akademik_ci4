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
    
    .fc-toolbar-title {
        color: var(--text-color) !important;
        font-weight: 800 !important;
        font-size: 1.5rem !important;
        letter-spacing: -0.5px;
    }

    .fc-button-primary {
        background-color: var(--card-bg) !important; 
        color: var(--text-muted) !important; 
        border: 1px solid var(--border-color) !important; 
        font-weight: 600 !important;
        text-transform: capitalize;
        box-shadow: none !important;
        border-radius: 8px !important;
        transition: all 0.2s;
    }

    .fc-button-primary:hover, .fc-button-primary.fc-button-active {
        background-color: var(--telur-asin-primary) !important;
        color: white !important;
        border-color: var(--telur-asin-primary) !important;
    }

    .fc-col-header-cell-cushion {
        color: var(--telur-asin-primary) !important;
        text-decoration: none !important;
        padding: 10px 0 !important;
        text-transform: uppercase;
        font-size: 0.8rem;
    }

    .fc-daygrid-day-number {
        color: var(--text-color) !important; 
        text-decoration: none !important;
        font-weight: 500;
        padding: 8px 12px !important;
    }

    .fc-theme-standard td, .fc-theme-standard th {
        border-color: var(--border-color) !important;
    }

    .fc-day-today {
        background-color: var(--hover-bg) !important; 
    }

    .fc-event {
        border: none !important;
        border-radius: 6px !important;
        padding: 3px 5px;
        font-size: 0.85rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        cursor: pointer;
        transition: transform 0.2s;
    }

    .fc-event:hover {
        transform: scale(1.02);
    }

    .event-item {
        border-left: 4px solid var(--telur-asin-primary);
        background: var(--hover-bg);
        padding: 10px 15px;
        border-radius: 0 8px 8px 0;
        margin-bottom: 10px;
        transition: all 0.2s;
    }

    .event-item:hover {
        background: var(--telur-asin-soft);
        transform: translateX(5px);
    }

    [data-theme="dark"] .event-item:hover {
        background: rgba(6, 182, 212, 0.2); 
    }

    .event-date {
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--telur-asin-primary);
        text-transform: uppercase;
    }

    .event-title {
        font-weight: 600;
        color: var(--text-color);
        margin-bottom: 0;
    }

    [data-theme="dark"] .text-dark { color: #e0e0e0 !important; }
    [data-theme="dark"] .text-muted { color: #a0a0a0 !important; }
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
            <h3 class="fw-bold mb-0" style="font-family: sans-serif; letter-spacing: -0.5px;">Kalender Akademik</h3>
            <p class="text-muted small mb-0">Jadwal kegiatan dan agenda penting</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 px-3 py-2 rounded-pill shadow-sm" style="background-color: var(--card-bg);">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none" style="color: var(--telur-asin-dark);"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kalender</li>
            </ol>
        </nav>
    </div>

    <div class="row g-4">
        <div class="col-lg-9">
            <div class="card card-modern h-100">
                <div class="card-body p-4">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card card-modern h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 fw-bold">
                        <i class="fas fa-bullhorn me-2 text-warning"></i> Agenda Terdekat
                    </h6>
                </div>
                <div class="card-body">
                    <div class="text-center py-5">
                        <i class="fas fa-calendar-times fa-3x text-muted opacity-25 mb-3"></i>
                        <p class="text-muted small">Belum ada agenda terdekat.</p>
                    </div>

                    <div class="alert alert-info mt-4 small border-0" style="background-color: rgba(6, 182, 212, 0.15); color: var(--telur-asin-primary);">
                        <i class="fas fa-info-circle me-1"></i> Klik pada tanggal di kalender untuk melihat detail acara.
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

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'id',
      themeSystem: 'standard',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek'
      },
      buttonText: {
        today: 'Hari Ini',
        month: 'Bulan',
        week: 'Minggu'
      },
      nowIndicator: true,
      events: [],
      eventDidMount: function(info) {
        info.el.title = info.event.title;
      }
    });

    calendar.render();

    document.getElementById('btn-bantuan').addEventListener('click', function() {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Butuh Bantuan?',
                html: 'Jika Anda mengalami kendala melihat jadwal atau agenda,<br>silakan hubungi Admin.',
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
                    window.open('https://wa.me/6283827914570?text=Halo%20Admin,%20saya%20butuh%20bantuan%20terkait%20Kalender%20Akademik.', '_blank');
                }
            });
        } else {
            alert('Silakan hubungi admin di 083827914570');
        }
    });
  });
</script>

<?php $this->endSection(); ?>