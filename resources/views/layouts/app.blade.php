<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kantor Imigrasi - Pembuatan Passport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --primary-light: #3b82f6;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --dark: #0f172a;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--dark);
            background: #ffffff;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            font-size: 1.8rem;
            color: var(--primary);
        }

        .nav-link {
            color: var(--dark) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
            position: relative;
            cursor: pointer;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: var(--primary);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }

        .nav-link:hover::after {
            width: 70%;
        }

        .nav-link.active {
            color: var(--primary) !important;
        }

        .nav-link.active::after {
            width: 70%;
        }

        .btn-outline-primary-custom {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary-custom:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .dropdown-menu {
            border: none;
            box-shadow: var(--shadow-lg);
            border-radius: 1rem;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: var(--light);
        }

        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: bottom;
        }

        .section {
            padding: 5rem 0;
        }

        .feature-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: var(--shadow-md);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--gray-light);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-light);
        }

        .feature-card h5 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .card {
            border: none;
            box-shadow: var(--shadow-md);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border-radius: 0.5rem;
            border: 2px solid var(--gray-light);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.1);
        }

        .alert {
            border-radius: 0.75rem;
            border: none;
            padding: 1rem 1.25rem;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
        }

        .table {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .table thead {
            background: var(--light);
        }

        .table-hover tbody tr:hover {
            background: rgba(37, 99, 235, 0.05);
        }

        footer {
            background: linear-gradient(135deg, var(--dark) 0%, #1e293b 100%);
            color: #cbd5e1;
            padding: 3rem 0 1.5rem;
            margin-top: 5rem;
        }

        footer h5,
        footer h6 {
            color: white;
            font-weight: 700;
        }

        footer a {
            color: #93c5fd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: var(--primary-light);
        }

        @media (max-width: 768px) {
            .hero {
                padding: 3rem 0;
            }

            .section {
                padding: 3rem 0;
            }

            .navbar-brand {
                font-size: 1.3rem;
            }

            .feature-card {
                margin-bottom: 1rem;
            }

            .btn-primary-custom,
            .btn-outline-primary-custom {
                padding: 0.4rem 1.2rem;
                font-size: 0.9rem;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: 0.15em;
        }

        .upload-area {
            border: 2px dashed var(--gray-light);
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--light);
        }

        .upload-area:hover {
            border-color: var(--primary);
            background: rgba(37, 99, 235, 0.05);
        }

        .upload-area.has-file {
            border-color: var(--success);
            background: rgba(16, 185, 129, 0.05);
        }
    </style>

    @stack('head')
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-passport"></i>
                <span>Kantor Imigrasi</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0" id="publicNav">
                    <li class="nav-item">
                        <a class="nav-link" data-target="overview" onclick="handleNavClick('overview')">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-target="requirements"
                            onclick="handleNavClick('requirements')">Persyaratan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-target="how" onclick="handleNavClick('how')">Cara Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-target="faq" onclick="handleNavClick('faq')">FAQ</a>
                    </li>
                </ul>

                <div id="authButtons" class="d-flex gap-2">
                    <a href="{{ url('/login') }}" class="btn btn-outline-primary-custom">Masuk</a>
                    <a href="{{ url('/register') }}" class="btn btn-primary-custom">Daftar</a>
                </div>

                <div id="userMenu" class="d-none">
                    <div class="dropdown">
                        <button class="btn btn-outline-primary-custom dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-2"></i>
                            <span id="userName">User</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ url('/profile') }}">
                                    <i class="bi bi-person me-2"></i>Profil
                                </a>
                            </li>
                            <li id="dashboardMenuItem" class="d-none">
                                <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
                                </a>
                            </li>
                            <li id="formMenuItem" class="d-none">
                                <a class="dropdown-item" href="{{ url('/form') }}">
                                    <i class="bi bi-file-earmark-text me-2"></i>Formulir Pengajuan
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="handleLogout()">
                                    <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main style="padding-top: 76px;">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <h5 class="mb-3">
                        <i class="bi bi-passport me-2"></i>Kantor Imigrasi
                    </h5>
                    <p class="small mb-3">Portal informasi pembuatan paspor – panduan lengkap, persyaratan, dan proses
                        pendaftaran yang mudah dan cepat.</p>
                    <p class="small mb-0">
                        <i class="bi bi-geo-alt-fill me-2"></i>Jl. Contoh No.10, Jakarta Pusat
                    </p>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="mb-3">Navigasi</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#overview"><i class="bi bi-chevron-right me-1"></i>Overview</a></li>
                        <li class="mb-2"><a href="#requirements"><i class="bi bi-chevron-right me-1"></i>Persyaratan</a>
                        </li>
                        <li class="mb-2"><a href="#how"><i class="bi bi-chevron-right me-1"></i>Cara Daftar</a></li>
                        <li class="mb-2"><a href="#faq"><i class="bi bi-chevron-right me-1"></i>FAQ</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Kontak</h6>
                    <p class="small mb-2">
                        <i class="bi bi-envelope-fill me-2"></i>
                        <a href="mailto:imigrasi@passport.com">imigrasi@passport.com</a>
                    </p>
                    <p class="small mb-2">
                        <i class="bi bi-telephone-fill me-2"></i>
                        <a href="tel:+622112345678">+62 21 1234 5678</a>
                    </p>
                    <p class="small mb-0">
                        <i class="bi bi-clock-fill me-2"></i>Senin - Jumat: 08:00 - 17:00
                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="mb-3">Media Sosial</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="#" class="text-decoration-none">
                            <i class="bi bi-linkedin" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
            </div>

            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">

            <div class="text-center small">
                &copy; {{ date('Y') }} Kantor Imigrasi – Semua hak cipta dilindungi.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        const BACKEND_URL = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";

        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100
        });

        function checkAuth() {
            const token = localStorage.getItem('uipassport_token');
            const userStr = localStorage.getItem('uipassport_user');

            if (token && userStr) {
                try {
                    const user = JSON.parse(userStr);
                    showAuthenticatedNav(user);
                } catch (e) {
                    console.error('Error parsing user data:', e);
                    localStorage.removeItem('uipassport_token');
                    localStorage.removeItem('uipassport_user');
                    showGuestNav();
                }
            } else {
                showGuestNav();
            }
        }

        // Tambahkan fungsi ini setelah fungsi checkAuth()
        function handleDynamicNavigation(targetUrl) {
            const token = localStorage.getItem('uipassport_token');
            const userStr = localStorage.getItem('uipassport_user');

            if (!token || !userStr) {
                // Not logged in, go to register
                window.location.href = '/register';
                return;
            }

            try {
                const user = JSON.parse(userStr);
                if (user.role === 'admin') {
                    window.location.href = '/dashboard';
                } else {
                    window.location.href = '/form';
                }
            } catch (e) {
                console.error('Error parsing user data:', e);
                window.location.href = '/register';
            }
        }

        function showAuthenticatedNav(user) {
            document.getElementById('authButtons').classList.add('d-none');
            document.getElementById('userMenu').classList.remove('d-none');
            document.getElementById('userName').textContent = user.nama_lengkap || user.email;
            document.getElementById('publicNav').classList.remove('d-none');

            if (user.role === 'admin') {
                document.getElementById('dashboardMenuItem').classList.remove('d-none');
                document.getElementById('formMenuItem').classList.add('d-none');
            } else {
                document.getElementById('formMenuItem').classList.remove('d-none');
                document.getElementById('dashboardMenuItem').classList.add('d-none');
            }
        }

        function showGuestNav() {
            document.getElementById('authButtons').classList.remove('d-none');
            document.getElementById('userMenu').classList.add('d-none');
            document.getElementById('publicNav').classList.remove('d-none');
            document.getElementById('dashboardMenuItem').classList.add('d-none');
            document.getElementById('formMenuItem').classList.add('d-none');
        }

        function handleLogout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                localStorage.removeItem('uipassport_token');
                localStorage.removeItem('uipassport_user');
                window.location.replace('/');
            }
        }

        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        function handleNavClick(sectionId) {
            const currentPage = window.location.pathname;

            if (currentPage !== '/' && currentPage !== '/home') {
                window.location.href = '/?section=' + sectionId;
                return;
            }

            const target = document.getElementById(sectionId);
            if (target) {
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });

                history.pushState(null, null, '#' + sectionId);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            checkAuth();

            const urlParams = new URLSearchParams(window.location.search);
            const sectionParam = urlParams.get('section');

            if (sectionParam) {
                setTimeout(() => {
                    const target = document.getElementById(sectionParam);
                    if (target) {
                        const offsetTop = target.offsetTop - 80;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                        history.replaceState(null, null, '#' + sectionParam);
                    }
                }, 300);
            }

            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                setTimeout(() => {
                    const target = document.getElementById(hash);
                    if (target) {
                        const offsetTop = target.offsetTop - 80;
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                    }
                }, 300);
            }
        });

        document.querySelectorAll('footer a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                handleNavClick(targetId);
            });
        });
    </script>
    @stack('scripts')
</body>

</html>