@extends('layouts.app')

@section('content')
    <section class="section"
        style="padding-top: 3rem; padding-bottom: 3rem; min-height: calc(100vh - 76px); background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="feature-card" data-aos="zoom-in" data-aos-delay="100">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-box-arrow-in-right text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-2">Masuk ke Kantor Imigrasi</h3>
                            <p class="text-muted small mb-0">Gunakan email dan password yang terdaftar</p>
                        </div>

                        <!-- Alert -->
                        <div id="loginAlert" class="alert d-none" role="alert"></div>

                        <!-- Form -->
                        <form id="loginForm" novalidate>
                            <div class="mb-3" data-aos="fade-up" data-aos-delay="150">
                                <label class="form-label small fw-semibold">
                                    <i class="bi bi-envelope me-1"></i>Email
                                </label>
                                <input type="email" id="email" class="form-control" placeholder="name@example.com" required>
                            </div>

                            <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                                <label class="form-label small fw-semibold">
                                    <i class="bi bi-lock me-1"></i>Password
                                </label>
                                <input type="password" id="password" class="form-control" placeholder="••••••••" required>
                            </div>

                            <button type="submit" class="btn btn-primary-custom w-100 py-3 mb-3" data-aos="fade-up"
                                data-aos-delay="250">
                                <span class="spinner-border spinner-border-sm d-none me-2" id="loginSpinner"></span>
                                <i class="bi bi-box-arrow-in-right me-2" id="loginIcon"></i>
                                <span id="loginBtnText">Masuk</span>
                            </button>

                            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                                <small class="text-muted">
                                    Belum punya akun?
                                    <a href="{{ url('/register') }}" class="text-primary fw-semibold text-decoration-none">
                                        Daftar Sekarang
                                    </a>
                                </small>
                            </div>
                        </form>

                        <!-- Footer -->
                        <div class="text-center mt-4 pt-3 border-top" data-aos="fade-up" data-aos-delay="350">
                            <small class="text-muted">
                                <i class="bi bi-shield-check me-1"></i>
                                Dengan masuk, Anda menyetujui syarat & ketentuan kami
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Add this function at the top of the script
function setCookie(name, value, days = 7) {
    const expires = new Date();
    expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
    document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/;SameSite=Lax`;
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
}

function deleteCookie(name) {
    document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;`;
}

// Check if already logged in on page load
document.addEventListener('DOMContentLoaded', function () {
    const token = getCookie('auth_token');
    const userRole = getCookie('user_role');

    if (token && userRole) {
        // Already logged in, redirect based on role
        if (userRole === 'admin') {
            window.location.href = '/dashboard';
        } else {
            window.location.href = '/form';
        }
        return;
    }
});

// Handle login form submission
document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const backend = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    const alertEl = document.getElementById('loginAlert');
    const spinner = document.getElementById('loginSpinner');
    const icon = document.getElementById('loginIcon');
    const submitBtn = document.querySelector('#loginForm button[type="submit"]');
    const btnText = document.getElementById('loginBtnText');

    alertEl.classList.add('d-none');

    spinner.classList.remove('d-none');
    icon.classList.add('d-none');
    btnText.textContent = 'Memproses...';
    submitBtn.disabled = true;

    if (!email || !password) {
        alertEl.className = 'alert alert-danger';
        alertEl.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div>Email dan password wajib diisi</div>
            </div>
        `;
        alertEl.classList.remove('d-none');

        spinner.classList.add('d-none');
        icon.classList.remove('d-none');
        btnText.textContent = 'Masuk';
        submitBtn.disabled = false;
        return;
    }

    try {
        const res = await fetch(`${backend}/api/auth/login`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });

        const data = await res.json();

        if (!res.ok) {
            alertEl.className = 'alert alert-danger';
            alertEl.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div>${data.message || 'Gagal login'}</div>
                </div>
            `;
            alertEl.classList.remove('d-none');
            return;
        }

        // Store in localStorage (for backward compatibility)
        localStorage.setItem('uipassport_token', data.token);
        localStorage.setItem('uipassport_user', JSON.stringify(data.user || {}));

        // Store in cookies (for server-side middleware)
        setCookie('auth_token', data.token, 7);
        setCookie('user_role', data.user.role, 7);
        setCookie('user_email', data.user.email, 7);

        alertEl.className = 'alert alert-success';
        alertEl.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div>${data.message || 'Login berhasil! Mengarahkan...'}</div>
            </div>
        `;
        alertEl.classList.remove('d-none');

        setTimeout(() => {
            if (data.user.role === 'admin') {
                window.location.href = '/dashboard';
            } else {
                window.location.href = '/form';
            }
        }, 700);
    } catch (err) {
        console.error(err);
        alertEl.className = 'alert alert-danger';
        alertEl.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div>Terjadi kesalahan jaringan</div>
            </div>
        `;
        alertEl.classList.remove('d-none');
    } finally {
        spinner.classList.add('d-none');
        icon.classList.remove('d-none');
        btnText.textContent = 'Masuk';
        submitBtn.disabled = false;
    }
});
    </script>
@endpush