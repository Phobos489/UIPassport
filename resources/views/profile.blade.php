@extends('layouts.app')

@section('content')
    <section class="section"
        style="padding-top: 2rem; padding-bottom: 4.5rem; min-height: 100vh; background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <!-- Header -->
            <div class="mb-4" data-aos="fade-down">
                <h2 class="fw-bold mb-2">
                    <i class="bi bi-person-circle text-primary me-2"></i>Profil Saya
                </h2>
                <p class="text-muted">Kelola informasi pribadi dan status pengajuan persyaratan Anda</p>
            </div>

            <div class="row g-4">
                <!-- Profile Information -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-3" data-aos="fade-right" data-aos-delay="100">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 80px; height: 80px;">
                                    <i class="bi bi-person-fill text-primary" style="font-size: 2.5rem;"></i>
                                </div>
                            </div>

                            <h5 class="fw-bold mb-1 text-center" id="profileNama">Loading...</h5>
                            <p class="text-muted text-center mb-2 small" id="profileEmail">-</p>

                            <div class="text-center">
                                <span class="badge bg-primary px-3 py-1 mb-2 small" id="profileRole">User</span>
                                <p class="small text-muted mb-0">
                                    <i class="bi bi-calendar-check me-1"></i>
                                    Bergabung: <span id="profileJoined">-</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Personal Information -->
                    <div class="card border-0 shadow-sm rounded-3 mb-4" data-aos="fade-left" data-aos-delay="100">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-person-lines-fill text-primary me-2"></i>Informasi Pribadi
                            </h5>

                            <div id="loadingProfile" class="text-center py-3">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="text-muted mt-2 mb-0 small">Memuat data profil...</p>
                            </div>

                            <div id="profileData" class="d-none">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-1">Nama Lengkap</label>
                                        <p class="fw-bold mb-2 small" id="infoNama">-</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-1">Email</label>
                                        <p class="fw-bold mb-2 small" id="infoEmail">-</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-1">Tanggal Lahir</label>
                                        <p class="fw-bold mb-2 small" id="infoTglLahir">-</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-1">Tempat Lahir</label>
                                        <p class="fw-bold mb-2 small" id="infoTempatLahir">-</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small text-muted mb-1">No. Telepon</label>
                                        <p class="fw-bold mb-2 small" id="infoTelepon">-</p>
                                    </div>
                                    <div class="col-12">
                                        <label class="small text-muted mb-1">Alamat</label>
                                        <p class="fw-bold mb-0 small" id="infoAlamat">-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submission Status -->
                    <div class="card border-0 shadow-sm rounded-3" data-aos="fade-left" data-aos-delay="150">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-clipboard-check text-success me-2"></i>Status Pengajuan Persyaratan
                            </h5>

                            <div id="loadingSubmission" class="text-center py-3">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="text-muted mt-2 mb-0 small">Memuat status pengajuan...</p>
                            </div>

                            <!-- No Submission -->
                            <div id="noSubmission" class="d-none text-center py-4">
                                <i class="bi bi-inbox text-muted" style="font-size: 2.5rem;"></i>
                                <h6 class="fw-bold mt-3 mb-2">Belum Ada Pengajuan</h6>
                                <p class="text-muted mb-3 small">Anda belum mengajukan persyaratan paspor</p>
                                <a href="{{ url('/form') }}" class="btn btn-primary btn-sm px-4">
                                    <i class="bi bi-plus-circle me-2"></i>Ajukan Sekarang
                                </a>
                            </div>

                            <!-- Has Submission -->
                            <div id="hasSubmission" class="d-none">
                                <!-- Status Badge -->
                                <div class="alert mb-3" id="statusAlert">
                                    <div class="d-flex align-items-start">
                                        <i class="bi fs-4 me-3" id="statusIcon"></i>
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-1" id="statusTitle">Status Pengajuan</h6>
                                            <p class="small mb-1" id="statusDesc">Deskripsi status</p>
                                            <small class="text-muted" id="statusDate">
                                                <i class="bi bi-calendar3 me-1"></i>Diajukan: -
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Admin Notes -->
                                <div id="adminNotesContainer" class="d-none alert alert-info mb-3">
                                    <h6 class="fw-bold mb-1 small">
                                        <i class="bi bi-chat-left-text me-2"></i>Catatan dari Admin
                                    </h6>
                                    <p class="mb-0 small" id="adminNotes">-</p>
                                </div>

                                <!-- Documents List -->
                                <h6 class="fw-bold mb-3 small">Dokumen yang Diunggah</h6>
                                <div class="row row-cols-1 row-cols-md-2 g-2">
                                    <div class="col">
                                        <div class="border rounded-2 p-2 h-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="bi bi-file-earmark-text text-primary me-2"></i>
                                                    <span class="fw-semibold small">KTP</span>
                                                </div>
                                                <a id="linkKTP" href="#" target="_blank"
                                                    class="btn btn-sm btn-outline-primary btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="border rounded-2 p-2 h-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="bi bi-file-earmark-text text-success me-2"></i>
                                                    <span class="fw-semibold small">KK</span>
                                                </div>
                                                <a id="linkKK" href="#" target="_blank"
                                                    class="btn btn-sm btn-outline-success btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="border rounded-2 p-2 h-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="bi bi-file-earmark-text text-warning me-2"></i>
                                                    <span class="fw-semibold small">Dokumen Paspor</span>
                                                </div>
                                                <a id="linkDokumen" href="#" target="_blank"
                                                    class="btn btn-sm btn-outline-warning btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-none" id="containerPewarganegaraan">
                                        <div class="border rounded-2 p-2 h-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="bi bi-file-earmark-text text-info me-2"></i>
                                                    <span class="fw-semibold small">Surat Pewarganegaraan</span>
                                                </div>
                                                <a id="linkPewarganegaraan" href="#" target="_blank"
                                                    class="btn btn-sm btn-outline-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-none" id="containerGantiNama">
                                        <div class="border rounded-2 p-2 h-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="bi bi-file-earmark-text text-secondary me-2"></i>
                                                    <span class="fw-semibold small">Surat Ganti Nama</span>
                                                </div>
                                                <a id="linkGantiNama" href="#" target="_blank"
                                                    class="btn btn-sm btn-outline-secondary btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Info Box -->
                                <div class="mt-3 p-2 bg-light rounded-2">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-info-circle text-primary me-2 fs-6"></i>
                                        <div>
                                            <small class="text-muted">
                                                Jika ada perubahan data atau ingin mengajukan ulang, silakan hubungi admin.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Override untuk ukuran yang lebih compact */
        .card {
            border: none !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .card-body {
            padding: 1.25rem !important;
        }

        .alert {
            padding: 0.5rem 0.75rem;
            margin-bottom: 1rem;
            border-radius: 0.375rem;
        }

        .border {
            border: 1px solid #e9ecef !important;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        /* Tombol lebih kecil */
        .btn-sm {
            padding: 0.25rem 0.5rem !important;
            font-size: 0.75rem !important;
        }
    </style>
@endsection

@push('scripts')
    <script>
        const backend = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Profile page loaded');

            // Check authentication
            const token = localStorage.getItem('uipassport_token');
            const userStr = localStorage.getItem('uipassport_user');

            if (!token || !userStr) {
                console.log('No auth token, redirecting to login');
                window.location.href = '/login';
                return;
            }

            console.log('Auth token found, loading data...');

            // Load profile data
            loadProfile();
            loadSubmissionStatus();
        });

        async function loadProfile() {
            const token = localStorage.getItem('uipassport_token');
            const loadingEl = document.getElementById('loadingProfile');
            const dataEl = document.getElementById('profileData');

            try {
                console.log('Fetching profile data...');

                const res = await fetch(`${backend}/api/auth/me`, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!res.ok) {
                    console.error('Profile fetch failed:', res.status, res.statusText);
                    throw new Error('Gagal memuat profil');
                }

                const user = await res.json();
                console.log('Profile data received:', user);

                // Update profile card
                document.getElementById('profileNama').textContent = user.nama_lengkap || 'User';
                document.getElementById('profileEmail').textContent = user.email || '-';
                document.getElementById('profileRole').textContent = user.role === 'admin' ? 'Administrator' : 'User';
                document.getElementById('profileJoined').textContent = user.created_at
                    ? new Date(user.created_at).toLocaleDateString('id-ID')
                    : '-';

                // Update detail info
                document.getElementById('infoNama').textContent = user.nama_lengkap || '-';
                document.getElementById('infoEmail').textContent = user.email || '-';
                document.getElementById('infoTglLahir').textContent = user.tanggal_lahir
                    ? new Date(user.tanggal_lahir).toLocaleDateString('id-ID')
                    : '-';
                document.getElementById('infoTempatLahir').textContent = user.tempat_lahir || '-';
                document.getElementById('infoTelepon').textContent = user.no_telepon || '-';
                document.getElementById('infoAlamat').textContent = user.alamat || '-';

                loadingEl.classList.add('d-none');
                dataEl.classList.remove('d-none');

                console.log('Profile data loaded successfully');

            } catch (err) {
                console.error('Profile load error:', err);
                loadingEl.innerHTML = `
                <div class="alert alert-danger py-1">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <small>Gagal memuat profil: ${err.message}</small>
                </div>
            `;
            }
        }

        async function loadSubmissionStatus() {
            const token = localStorage.getItem('uipassport_token');
            const userStr = localStorage.getItem('uipassport_user');
            const user = JSON.parse(userStr);

            console.log('Loading submission status for user:', user);

            const loadingEl = document.getElementById('loadingSubmission');
            const noSubmissionEl = document.getElementById('noSubmission');
            const hasSubmissionEl = document.getElementById('hasSubmission');

            // Admin shouldn't see submission status
            if (user.role === 'admin') {
                console.log('User is admin, showing admin message');
                loadingEl.classList.add('d-none');
                noSubmissionEl.classList.remove('d-none');
                noSubmissionEl.innerHTML = `
                <div class="text-center py-2">
                    <i class="bi bi-shield-check text-primary mb-2" style="font-size: 2rem;"></i>
                    <h6 class="fw-bold mb-1 small">Akun Administrator</h6>
                    <p class="text-muted small mb-2">Anda login sebagai admin.</p>
                    <a href="/dashboard" class="btn btn-primary btn-sm px-2">
                        <i class="bi bi-speedometer2 me-1"></i>Dashboard Admin
                    </a>
                </div>
            `;
                return;
            }

            try {
                console.log('Fetching submission status...');

                const res = await fetch(`${backend}/api/requirements/my-requirements`, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!res.ok) {
                    console.error('Submission fetch failed:', res.status, res.statusText);
                    throw new Error('Gagal memuat status pengajuan');
                }

                const data = await res.json();
                console.log('Submission data received:', data);

                loadingEl.classList.add('d-none');

                if (!data || data.length === 0) {
                    console.log('No submission found');
                    noSubmissionEl.classList.remove('d-none');
                    return;
                }

                // Get latest submission
                const submission = data[0];
                console.log('Latest submission:', submission);

                // Show submission data
                hasSubmissionEl.classList.remove('d-none');

                // Set status
                updateStatusDisplay(submission.status);

                // Set date
                document.getElementById('statusDate').innerHTML = `
                <i class="bi bi-calendar3 me-1"></i>Diajukan: ${new Date(submission.created_at).toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                })}
            `;

                // Set admin notes
                if (submission.catatan_admin) {
                    document.getElementById('adminNotesContainer').classList.remove('d-none');
                    document.getElementById('adminNotes').textContent = submission.catatan_admin;
                }

                // Set document links
                if (submission.ktp_path) {
                    document.getElementById('linkKTP').href = `${backend}/${submission.ktp_path}`;
                }

                if (submission.kk_path) {
                    document.getElementById('linkKK').href = `${backend}/${submission.kk_path}`;
                }

                if (submission.dokumen_path) {
                    document.getElementById('linkDokumen').href = `${backend}/${submission.dokumen_path}`;
                }

                if (submission.surat_pewarganegaraan_path) {
                    document.getElementById('containerPewarganegaraan').classList.remove('d-none');
                    document.getElementById('linkPewarganegaraan').href = `${backend}/${submission.surat_pewarganegaraan_path}`;
                }

                if (submission.surat_ganti_nama_path) {
                    document.getElementById('containerGantiNama').classList.remove('d-none');
                    document.getElementById('linkGantiNama').href = `${backend}/${submission.surat_ganti_nama_path}`;
                }

                console.log('Submission status loaded successfully');

            } catch (err) {
                console.error('Submission load error:', err);
                loadingEl.innerHTML = `
                <div class="alert alert-danger py-1">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <small>Gagal memuat status pengajuan: ${err.message}</small>
                </div>
            `;
            }
        }

        function updateStatusDisplay(status) {
            console.log('Updating status display for:', status);

            const statusAlert = document.getElementById('statusAlert');
            const statusIcon = document.getElementById('statusIcon');
            const statusTitle = document.getElementById('statusTitle');
            const statusDesc = document.getElementById('statusDesc');

            const statusConfig = {
                'diproses': {
                    class: 'alert-warning',
                    icon: 'bi-hourglass-split',
                    title: 'Sedang Diproses',
                    desc: 'Pengajuan Anda sedang dalam proses verifikasi.'
                },
                'diterima': {
                    class: 'alert-success',
                    icon: 'bi-check-circle-fill',
                    title: 'Diterima',
                    desc: 'Pengajuan Anda telah diterima.'
                },
                'ditolak': {
                    class: 'alert-danger',
                    icon: 'bi-x-circle-fill',
                    title: 'Ditolak',
                    desc: 'Pengajuan Anda ditolak. Silakan periksa catatan admin.'
                },
                'menunggu': {
                    class: 'alert-info',
                    icon: 'bi-clock',
                    title: 'Menunggu',
                    desc: 'Pengajuan Anda sedang menunggu proses.'
                }
            };

            const config = statusConfig[status] || statusConfig['diproses'];

            statusAlert.className = `alert ${config.class} mb-3`;
            statusIcon.className = `bi ${config.icon} fs-4 me-3`;
            statusTitle.textContent = config.title;
            statusDesc.textContent = config.desc;
        }
    </script>
@endpush