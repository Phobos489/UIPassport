@extends('layouts.app')

@section('content')
    <section class="section"
        style="padding-top: 3rem; padding-bottom: 3rem; min-height: calc(100vh - 76px); background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 col-xl-8">
                    <div class="feature-card" data-aos="zoom-in" data-aos-delay="100">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="bi bi-person-plus text-success" style="font-size: 2rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-2">Daftar Akun Baru</h3>
                            <p class="text-muted small mb-0">Isi data diri untuk membuat akun dan mengajukan persyaratan
                                paspor</p>
                        </div>

                        <!-- Alert -->
                        <div id="regAlert" class="alert d-none" role="alert"></div>

                        <!-- Form -->
                        <form id="registerForm" novalidate>
                            <div class="row g-3">
                                <!-- Nama Lengkap -->
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                                    <label class="form-label small fw-semibold">
                                        <i class="bi bi-person me-1"></i>
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap"
                                        required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <label class="form-label small fw-semibold">
                                        <i class="bi bi-envelope me-1"></i>
                                        Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" id="email" class="form-control" placeholder="name@example.com"
                                        required>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="250">
                                    <label class="form-label small fw-semibold">
                                        <i class="bi bi-lock me-1"></i>
                                        Password <span class="text-danger">*</span>
                                    </label>
                                    <input type="password" id="password" class="form-control"
                                        placeholder="Minimal 6 karakter" required>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <label class="form-label small fw-semibold">
                                        <i class="bi bi-calendar me-1"></i>
                                        Tanggal Lahir
                                    </label>
                                    <input type="date" id="tanggal_lahir" class="form-control">
                                </div>

                                <!-- Tempat Lahir -->
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="350">
                                    <label class="form-label small fw-semibold">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        Tempat Lahir
                                    </label>
                                    <input type="text" id="tempat_lahir" class="form-control" placeholder="Contoh: Jakarta">
                                </div>

                                <!-- No Telepon -->
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                    <label class="form-label small fw-semibold">
                                        <i class="bi bi-phone me-1"></i>
                                        No. Telepon
                                    </label>
                                    <input type="tel" id="no_telepon" class="form-control" placeholder="+62...">
                                </div>

                                <!-- Alamat -->
                                <div class="col-12" data-aos="fade-up" data-aos-delay="450">
                                    <label class="form-label small fw-semibold">
                                        <i class="bi bi-house me-1"></i>
                                        Alamat
                                    </label>
                                    <textarea id="alamat" class="form-control" rows="2"
                                        placeholder="Alamat lengkap"></textarea>
                                </div>
                            </div>

                            <!-- Info Box -->
                            <div class="alert alert-info d-flex align-items-start mt-3 mb-4" data-aos="fade-up"
                                data-aos-delay="500">
                                <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                                <small>
                                    <strong>Catatan:</strong> Field yang ditandai dengan <span class="text-danger">*</span>
                                    wajib diisi
                                </small>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary-custom w-100 py-3 mb-3" data-aos="fade-up"
                                data-aos-delay="550">
                                <span class="spinner-border spinner-border-sm d-none me-2" id="regSpinner"></span>
                                <i class="bi bi-person-plus me-2" id="regIcon"></i>
                                <span id="regBtnText">Daftar</span>
                            </button>

                            <!-- Link to Login -->
                            <div class="text-center" data-aos="fade-up" data-aos-delay="600">
                                <small class="text-muted">
                                    Sudah punya akun?
                                    <a href="{{ url('/login') }}" class="text-primary fw-semibold text-decoration-none">
                                        Masuk
                                    </a>
                                </small>
                            </div>
                        </form>

                        <!-- Footer -->
                        <div class="text-center mt-4 pt-3 border-top" data-aos="fade-up" data-aos-delay="650">
                            <small class="text-muted">
                                <i class="bi bi-check-circle me-1"></i>
                                Setelah mendaftar, Anda dapat langsung mengisi formulir persyaratan
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
        // Cookie helper functions
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

document.addEventListener('DOMContentLoaded', function () {
    // Check if already logged in
    const token = getCookie('auth_token');
    const userRole = getCookie('user_role');

    if (token && userRole) {
        if (userRole === 'admin') {
            window.location.href = '/dashboard';
        } else {
            window.location.href = '/form';
        }
        return;
    }

    const today = new Date();
    const maxDate = new Date(today.getFullYear() - 17, today.getMonth(), today.getDate());
    const dateInput = document.getElementById('tanggal_lahir');

    if (dateInput) {
        dateInput.max = maxDate.toISOString().split('T')[0];
    }
});

document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const backend = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";

    const payload = {
        email: document.getElementById('email').value.trim(),
        password: document.getElementById('password').value,
        nama_lengkap: document.getElementById('nama_lengkap').value.trim(),
        tanggal_lahir: document.getElementById('tanggal_lahir').value || null,
        tempat_lahir: document.getElementById('tempat_lahir').value.trim() || null,
        alamat: document.getElementById('alamat').value.trim() || null,
        no_telepon: document.getElementById('no_telepon').value.trim() || null
    };

    const alertEl = document.getElementById('regAlert');
    const spinner = document.getElementById('regSpinner');
    const icon = document.getElementById('regIcon');
    const submitBtn = document.querySelector('#registerForm button[type="submit"]');
    const btnText = document.getElementById('regBtnText');

    alertEl.classList.add('d-none');

    spinner.classList.remove('d-none');
    icon.classList.add('d-none');
    btnText.textContent = 'Memproses...';
    submitBtn.disabled = true;

    if (!payload.email || !payload.password || !payload.nama_lengkap) {
        alertEl.className = 'alert alert-danger';
        alertEl.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div>Nama lengkap, email, dan password wajib diisi</div>
            </div>
        `;
        alertEl.classList.remove('d-none');

        spinner.classList.add('d-none');
        icon.classList.remove('d-none');
        btnText.textContent = 'Daftar';
        submitBtn.disabled = false;
        return;
    }

    try {
        const res = await fetch(`${backend}/api/auth/register`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const data = await res.json();

        if (!res.ok) {
            alertEl.className = 'alert alert-danger';
            alertEl.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div>${data.message || 'Gagal registrasi'}</div>
                </div>
            `;
            alertEl.classList.remove('d-none');
            return;
        }

        // Store in localStorage
        localStorage.setItem('uipassport_token', data.token);
        localStorage.setItem('uipassport_user', JSON.stringify(data.user || {}));

        // Store in cookies
        setCookie('auth_token', data.token, 7);
        setCookie('user_role', data.user.role, 7);
        setCookie('user_email', data.user.email, 7);

        alertEl.className = 'alert alert-success';
        alertEl.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div>${data.message || 'Registrasi berhasil! Mengarahkan ke formulir...'}</div>
            </div>
        `;
        alertEl.classList.remove('d-none');

        setTimeout(() => window.location.href = '/form', 900);
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
        btnText.textContent = 'Daftar';
        submitBtn.disabled = false;
    }
});
    </script>
@endpush