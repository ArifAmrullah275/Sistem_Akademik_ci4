<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --bg-body: #ecf0f5;
            --bg-sidebar: #ffffff;
            --text-color: #333333;
            --text-muted: #6c757d;
            --border-color: #f4f4f4;
            --card-bg: #ffffff;
            --hover-bg: #f4f6f9;
            --input-bg: #ffffff;
            --input-border: #ced4da;
            --navbar-bg: #3c8dbc;
            --brand-bg: #367fa9;
            --sidebar-width: 250px;
            --toggle-width: 55px; 
            --closed-sidebar-width: var(--toggle-width);
            --header-height: 55px;
            --top-spacing: 25px; 
        }

        [data-theme="dark"] {
            --bg-body: #121212;
            --bg-sidebar: #1e1e1e;
            --text-color: #e0e0e0;
            --text-muted: #a0a0a0;
            --border-color: #333333;
            --card-bg: #1e1e1e;
            --hover-bg: #2c2c2c;
            --input-bg: #2c2c2c;
            --input-border: #444;
            --navbar-bg: #222;
            --brand-bg: #000;
        }

        body {
            background-color: var(--bg-body); 
            font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
            overflow-x: hidden; 
        }

        .navbar-siakad {
            background-color: var(--navbar-bg);
            z-index: 1030;
            padding: 0;
            transition: background-color 0.3s;
            position: fixed; 
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            display: flex;
            align-items: center;
        }

        .navbar-brand-container {
            width: var(--sidebar-width);
            transition: transform 0.3s, width 0.3s; 
            height: var(--header-height);
            overflow: hidden;
            flex-shrink: 0;
            transform-origin: left;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent; 
        }

        .navbar-brand {
            background-color: transparent;
            width: auto; 
            text-align: center;
            padding: 0 15px;
            margin: 0;
            transition: background-color 0.3s, width 0.3s;
            font-weight: bold;
            font-size: 20px;
            color: white !important; 
        }

        .navbar-text { color: white !important; }

        .sidebar {
            position: fixed;
            top: var(--header-height); 
            bottom: 0;
            left: 0;
            z-index: 1000;
            width: var(--sidebar-width); 
            padding: 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: var(--bg-sidebar);
            overflow-y: auto;
            transition: background-color 0.3s, transform 0.3s ease-in-out; 
        }

        .user-panel {
            padding: 15px;
            display: flex;
            align-items: center;
            background-color: var(--bg-sidebar);
            border-bottom: 1px solid var(--border-color);
        }
        
        .user-image {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 15px;
            background-color: #d2d6de;
        }

        .info p {
            margin: 0;
            font-weight: 600;
            color: var(--text-color);
        }

        .info small {
            color: #28a745;
            font-size: 11px;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: var(--text-color);
            padding: 12px 20px;
            border-left: 3px solid transparent;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: var(--text-color);
            background-color: var(--hover-bg);
            border-left-color: #3c8dbc;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
            color: var(--text-color);
            opacity: 0.7;
        }
        
        .header-menu {
            color: var(--text-muted);
            background: var(--hover-bg);
            padding: 10px 25px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        main {
            margin-top: 0; 
            width: 100%; 
        }

        .logged-in-content {
            margin-left: var(--sidebar-width); 
            padding: calc(var(--header-height) + var(--top-spacing)) 20px 20px 20px;
            transition: margin-left 0.3s; 
            
            width: calc(100vw - var(--sidebar-width)); 
            min-height: calc(100vh - var(--header-height));
        }

        .full-content {
            padding: calc(var(--header-height) + var(--top-spacing)) 20px 20px 20px; 
            margin-left: 0;
            width: 100vw;
        }

        .main-content-wrapper {
            max-width: 1300px;
            margin: 0 auto;
            width: 100%;
        }

        .card, .bg-white {
            background-color: var(--card-bg) !important;
            color: var(--text-color) !important;
            border-color: var(--border-color) !important;
        }

        .form-control {
            background-color: var(--input-bg);
            color: var(--text-color);
            border-color: var(--input-border);
        }

        .form-control:focus {
            background-color: var(--input-bg);
            color: var(--text-color);
        }

        .table {
            color: var(--text-color);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .text-muted {
            color: #a0a0a0 !important;
        }

        [data-theme="dark"] .text-dark {
            color: #e0e0e0 !important;
        }

        @media (min-width: 768px) {

            #sidebarToggleDesktop {
                position: absolute;
                left: var(--sidebar-width); 
                top: 0;
                height: var(--header-height); 
                width: var(--toggle-width); 
                display: flex !important;
                align-items: center;
                justify-content: center;
                z-index: 1040; 
                transition: left 0.3s; 
            }

            body.sb-toggled .sidebar {
                transform: translateX(calc(-1 * var(--sidebar-width))); 
            }

            body.sb-toggled .logged-in-content {
                margin-left: var(--closed-sidebar-width); 
                width: calc(100vw - var(--closed-sidebar-width)); 
            }

            body.sb-toggled .navbar-brand-container {
                transform: translateX(calc(-1 * var(--sidebar-width))); 
            }

            body.sb-toggled #sidebarToggleDesktop {
                left: 0; 
            }

            #hamburgerBtn { display: none !important; }

            .w-100 {
                width: 100%; 
                margin-left: var(--sidebar-width); 
                transition: margin-left 0.3s; 
                flex-grow: 1; 
                padding-right: 0 !important;
            }

            body.sb-toggled .w-100 {
                margin-left: var(--closed-sidebar-width); 
            }
        }

        @media (max-width: 767.98px) {
            .navbar-brand { width: 100%; text-align: left; padding-left: 20px; }
            .logged-in-content { margin-left: 0 !important; } 

            .sidebar { 
                height: 100vh;
                position: fixed; 
                top: var(--header-height);
                left: 0;
                transform: translateX(calc(-1 * var(--sidebar-width))); 
                box-shadow: 2px 0 5px rgba(0,0,0,0.2);
                transition: transform 0.3s ease-in-out; 
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 999;
            }

            .sidebar-overlay.show { display: block; }
            #sidebarToggleDesktop { display: none !important; } 
        }
    </style>
</head>
<body>
    <header class="navbar navbar-dark sticky-top navbar-siakad flex-md-nowrap shadow-sm">
        <div class="navbar-brand-container">
            <a class="navbar-brand me-0" href="#">Sistem Akademik</a>
        </div>
        
        <?php if(session()->get('logged_in')) : ?>
            <button class="btn btn-sm text-white d-none d-md-block" id="sidebarToggleDesktop" title="Toggle Sidebar">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        <?php endif; ?>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" id="hamburgerBtn" style="right: 15px; top: 10px;">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="w-100 d-flex justify-content-end px-3">
            <?php if(session()->get('logged_in')) : ?>
                <ul class="navbar-nav px-3 flex-row align-items-center">
                    
                    <li class="nav-item text-nowrap me-3">
                        <button class="btn btn-outline-light btn-sm rounded-circle" id="darkModeToggle" title="Ganti Mode Gelap/Terang">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>

                    <li class="nav-item text-nowrap me-3">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('img/' . (session()->get('foto') ? session()->get('foto') : 'default.png')) ?>" 
                                 class="rounded-circle me-2 border border-light" 
                                 style="width: 30px; height: 30px; object-fit: cover;" 
                                 alt="User Image">
                            
                            <span class="text-white d-none d-md-inline">
                                 <?= session()->get('nama_lengkap'); ?>
                            </span>
                        </div>
                    </li>

                    <li class="nav-item text-nowrap">
                        <a class="btn btn-outline-light btn-sm" href="<?= base_url('logout') ?>" id="btn-logout">Logout</a>
                    </li>
                </ul>
            <?php else : ?>
                <a class="btn btn-outline-light btn-sm" href="<?= base_url('login') ?>">Login</a>
            <?php endif; ?>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            
            <?php if(session()->get('logged_in')) : ?>
            <div class="sidebar-overlay" id="sidebarOverlay"></div>
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky pt-3">
                    
                    <div class="user-panel mb-3">
                        <div class="user-image">
                             <img src="<?= base_url('img/' . (session()->get('foto') ? session()->get('foto') : 'default.png')) ?>" 
                                  class="rounded-circle" 
                                  style="width: 45px; height: 45px; object-fit: cover;" 
                                  alt="User">
                        </div>
                        <div class="info">
                            <p><?= session()->get('nama_lengkap'); ?></p>
                            <small><i class="fas fa-circle"></i> Online</small>
                        </div>
                    </div>

                    <div class="px-3 mb-3">
                        <input class="form-control form-control-sm" type="text" placeholder="Pencarian..." aria-label="Search" id="sidebarSearch">
                    </div>

                    <h6 class="header-menu border-bottom">MAIN NAVIGATION</h6>
                    <ul class="nav flex-column" id="sidebarNavList">
                        <li class="nav-item">
                            <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                                <i class="fas fa-tachometer-alt"></i> 
                                Dashboard
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?= uri_string() == 'biodata' ? 'active' : '' ?>" href="<?= base_url('biodata') ?>">
                                <i class="fas fa-id-card"></i>
                                Biodata
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?= uri_string() == 'mahasiswa' || uri_string() == 'mahasiswa/tambah' || strpos(uri_string(), 'mahasiswa/edit') === 0 ? 'active' : '' ?>" href="<?= base_url('mahasiswa') ?>">
                                <i class="fas fa-user-graduate"></i>
                                Data Mahasiswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= uri_string() == 'matakuliah' || uri_string() == 'matakuliah/tambah' || strpos(uri_string(), 'matakuliah/edit') === 0 ? 'active' : '' ?>" href="<?= base_url('matakuliah') ?>">
                                <i class="fas fa-book"></i>
                                Data Mata Kuliah
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?= uri_string() == 'kalender' ? 'active' : '' ?>" href="<?= base_url('kalender') ?>">
                                <i class="fas fa-calendar-alt"></i>
                                Kalender Akademik
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <?php endif; ?>

            <main class="<?= session()->get('logged_in') ? 'logged-in-content' : 'full-content' ?>">
                <div class="main-content-wrapper">
                    <?= $this->renderSection('isi') ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // --- 1. SCRIPT LOGOUT (SWEETALERT2) ---
        $(document).on('click', '#btn-logout', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Yakin ingin keluar?',
                text: "Sesi Anda akan diakhiri.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            });
        });

        // --- 2. SCRIPT HAMBURGER MENU (TOGGLE) ---
        const sidebarToggleDesktop = document.getElementById('sidebarToggleDesktop');
        const hamburgerBtn = document.getElementById('hamburgerBtn'); 
        const sidebar = document.getElementById('sidebarMenu');
        const overlay = document.getElementById('sidebarOverlay');
        const body = document.body;

        if (sidebarToggleDesktop) {
            if (localStorage.getItem('sb-sidebar-toggled') === 'true' && window.innerWidth >= 768) {
                body.classList.add('sb-toggled');
            }

            sidebarToggleDesktop.addEventListener('click', function(e) {
                e.preventDefault();
                body.classList.toggle('sb-toggled');

                if (body.classList.contains('sb-toggled')) {
                    localStorage.setItem('sb-sidebar-toggled', 'true');
                } else {
                    localStorage.removeItem('sb-sidebar-toggled');
                }
            });
        }

        if(hamburgerBtn) {
            hamburgerBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                if(overlay) overlay.classList.toggle('show');
            });
        }

        if(overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });
        }

        // --- 3. SCRIPT SEARCH FILTER (CLIENT-SIDE) ---
        $(document).ready(function() {
            $('#sidebarSearch').on('keyup', function() {
                const searchValue = $(this).val().toLowerCase();

                $('#sidebarNavList .nav-item').filter(function() {
                    const text = $(this).text().toLowerCase();
                    $(this).toggle(text.indexOf(searchValue) > -1);
                });

                const visibleItems = $('#sidebarNavList .nav-item:visible').length;
                if (visibleItems === 0 && searchValue.length > 0) {
                    $('.header-menu').hide();
                } else {
                    $('.header-menu').show();
                }
            });
        });

        // --- 4. SCRIPT DARK MODE ---
        const darkModeToggle = document.getElementById('darkModeToggle');
        const icon = darkModeToggle ? darkModeToggle.querySelector('i') : null;

        if (localStorage.getItem('theme') === 'dark') {
            body.setAttribute('data-theme', 'dark');
            if(icon) { icon.classList.remove('fa-moon'); icon.classList.add('fa-sun'); }
        }

        if(darkModeToggle) {
            darkModeToggle.addEventListener('click', () => {
                if (body.getAttribute('data-theme') === 'dark') {
                    // Switch ke Light Mode
                    body.removeAttribute('data-theme');
                    localStorage.setItem('theme', 'light');
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                } else {
                    // Switch ke Dark Mode
                    body.setAttribute('data-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                }
            });
        }
    </script>
</body>
</html>