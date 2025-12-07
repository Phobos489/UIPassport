@extends('layouts.app')

@section('content')
    <section class="section"
        style="padding-top: 2rem; padding-bottom: 4.5rem; min-height: 100vh; background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 col-xl-2 mb-4">
                    <div class="sidebar-wrapper" data-aos="fade-right">
                        <div class="feature-card p-3">
                            <h6 class="fw-bold mb-3 pb-2 border-bottom">
                                <i class="bi bi-grid-fill text-primary me-2"></i>Menu Admin
                            </h6>

                            <nav class="nav flex-column">
                                <a class="nav-link sidebar-link active" href="#" data-section="overview"
                                    onclick="switchSection('overview')">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    <span>Overview</span>
                                </a>
                                <a class="nav-link sidebar-link" href="#" data-section="requirements"
                                    onclick="switchSection('requirements')">
                                    <i class="bi bi-file-earmark-text me-2"></i>
                                    <span>Pengajuan</span>
                                </a>
                                <a class="nav-link sidebar-link" href="#" data-section="users"
                                    onclick="switchSection('users')">
                                    <i class="bi bi-people me-2"></i>
                                    <span>Kelola User</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9 col-xl-10">
                    <!-- Header -->
                    <div class="mb-4" data-aos="fade-down">
                        <h2 class="fw-bold mb-2">
                            <i class="bi bi-speedometer2 text-primary me-2"></i>Dashboard Admin
                        </h2>
                        <p class="text-muted">Kelola semua pengajuan persyaratan paspor dan akun user</p>
                    </div>

                    <!-- Alert -->
                    <div id="dashboardAlert" class="alert d-none" role="alert"></div>

                    <!-- Overview Section -->
                    <div id="overviewSection" class="content-section">
                        <!-- Statistics Cards -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="feature-card text-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-people text-primary" style="font-size: 1.8rem;"></i>
                                    </div>
                                    <h3 class="fw-bold mb-1" id="statTotalUsers">0</h3>
                                    <p class="text-muted mb-0 small">Total User</p>
                                </div>
                            </div>
                            <div class="col-md-3" data-aos="fade-up" data-aos-delay="150">
                                <div class="feature-card text-center">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-hourglass-split text-warning" style="font-size: 1.8rem;"></i>
                                    </div>
                                    <h3 class="fw-bold mb-1" id="statDiproses">0</h3>
                                    <p class="text-muted mb-0 small">Sedang Diproses</p>
                                </div>
                            </div>
                            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-card text-center">
                                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-check-circle text-success" style="font-size: 1.8rem;"></i>
                                    </div>
                                    <h3 class="fw-bold mb-1" id="statDiterima">0</h3>
                                    <p class="text-muted mb-0 small">Diterima</p>
                                </div>
                            </div>
                            <div class="col-md-3" data-aos="fade-up" data-aos-delay="250">
                                <div class="feature-card text-center">
                                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-x-circle text-danger" style="font-size: 1.8rem;"></i>
                                    </div>
                                    <h3 class="fw-bold mb-1" id="statDitolak">0</h3>
                                    <p class="text-muted mb-0 small">Ditolak</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Requirements Section -->
                    <div id="requirementsSection" class="content-section d-none">
                        <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold mb-0">
                                    <i class="bi bi-list-check text-primary me-2"></i>Daftar Pengajuan
                                </h5>
                                <button class="btn btn-primary-custom btn-sm" onclick="loadRequirements()">
                                    <i class="bi bi-arrow-clockwise me-1"></i>Refresh
                                </button>
                            </div>

                            <!-- Loading Spinner -->
                            <div id="loadingSpinner" class="text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="text-muted mt-2">Memuat data...</p>
                            </div>

                            <!-- Table -->
                            <div id="tableContainer" class="d-none">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="requirementsTableBody" class="align-middle">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Empty State -->
                            <div id="emptyState" class="text-center py-5 d-none">
                                <i class="bi bi-inbox text-muted" style="font-size: 4rem;"></i>
                                <p class="text-muted mt-3">Belum ada pengajuan persyaratan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Users Section -->
                    <div id="usersSection" class="content-section d-none">
                        <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold mb-0">
                                    <i class="bi bi-people text-primary me-2"></i>Kelola Akun User
                                </h5>
                                <button class="btn btn-primary-custom btn-sm" onclick="loadUsers()">
                                    <i class="bi bi-arrow-clockwise me-1"></i>Refresh
                                </button>
                            </div>

                            <!-- Loading Spinner -->
                            <div id="loadingUsers" class="text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="text-muted mt-2">Memuat data user...</p>
                            </div>

                            <!-- Users Table -->
                            <div id="usersTableContainer" class="d-none">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Tanggal Lahir</th>
                                                <th>No. Telepon</th>
                                                <th>Bergabung</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="usersTableBody" class="align-middle">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Empty State -->
                            <div id="emptyUsers" class="text-center py-5 d-none">
                                <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                                <p class="text-muted mt-3">Belum ada user terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Detail Requirement -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content"
                style="border-radius: 1rem; border: none; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-file-earmark-text text-primary me-2"></i>Detail Pengajuan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- User Info -->
                    <div class="bg-light rounded-3 p-3 mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">Nama Lengkap</small>
                                <strong id="detailNama">-</strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">Email</small>
                                <strong id="detailEmail">-</strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">Tanggal Pengajuan</small>
                                <strong id="detailTanggal">-</strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">Status Saat Ini</small>
                                <span id="detailStatusBadge" class="badge">-</span>
                            </div>
                        </div>
                    </div>

                    <!-- Documents -->
                    <h6 class="fw-bold mb-3">Dokumen yang Diunggah</h6>
                    <div class="row g-3 mb-4">
                        <!-- TAMBAHKAN FOTO DI SINI -->
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">Foto Diri</span>
                                    <a id="linkFoto" href="#" target="_blank" class="btn btn-sm btn-outline-primary-custom">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">KTP</span>
                                    <a id="linkKTP" href="#" target="_blank" class="btn btn-sm btn-outline-primary-custom">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">KK</span>
                                    <a id="linkKK" href="#" target="_blank" class="btn btn-sm btn-outline-primary-custom">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">Dokumen Paspor</span>
                                    <a id="linkDokumen" href="#" target="_blank"
                                        class="btn btn-sm btn-outline-primary-custom">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="containerSuratPewarganegaraan">
                            <div class="border rounded-3 p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">Surat Pewarganegaraan</span>
                                    <a id="linkSuratPewarganegaraan" href="#" target="_blank"
                                        class="btn btn-sm btn-outline-primary-custom">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="containerSuratGantiNama">
                            <div class="border rounded-3 p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">Surat Ganti Nama</span>
                                    <a id="linkSuratGantiNama" href="#" target="_blank"
                                        class="btn btn-sm btn-outline-primary-custom">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Status Form -->
                    <h6 class="fw-bold mb-3">Update Status</h6>
                    <form id="updateStatusForm">
                        <input type="hidden" id="requirementId">
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="statusSelect" required>
                                <option value="diproses">Sedang Diproses</option>
                                <option value="diterima">Diterima</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catatan Admin (Opsional)</label>
                            <textarea class="form-control" id="catatanAdmin" rows="3"
                                placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                        </div>
                        <div class="d-flex gap-2 justify-content-end">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary-custom">
                                <span class="spinner-border spinner-border-sm d-none" id="updateSpinner"></span>
                                <i class="bi bi-check-circle me-1"></i>Update Status
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail User -->
    <div class="modal fade" id="userDetailModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content" style="border-radius: 1rem; border: none;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-person-circle text-primary me-2"></i>Detail User
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-person-fill text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>

                    <div class="bg-light rounded-3 p-3">
                        <div class="row g-3">
                            <div class="col-12">
                                <small class="text-muted d-block mb-1">Nama Lengkap</small>
                                <strong id="userDetailNama">-</strong>
                            </div>
                            <div class="col-12">
                                <small class="text-muted d-block mb-1">Email</small>
                                <strong id="userDetailEmail">-</strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">Tanggal Lahir</small>
                                <strong id="userDetailTglLahir">-</strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">Tempat Lahir</small>
                                <strong id="userDetailTempatLahir">-</strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">No. Telepon</small>
                                <strong id="userDetailTelepon">-</strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block mb-1">Bergabung</small>
                                <strong id="userDetailJoined">-</strong>
                            </div>
                            <div class="col-12">
                                <small class="text-muted d-block mb-1">Alamat</small>
                                <strong id="userDetailAlamat">-</strong>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-center">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .sidebar-wrapper {
            position: sticky;
            top: 90px;
        }

        .sidebar-link {
            color: var(--dark);
            padding: 0.75rem 1rem;
            margin-bottom: 0.25rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .sidebar-link:hover {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
        }

        .sidebar-link.active {
            background: var(--primary);
            color: white !important;
        }

        .sidebar-link i {
            font-size: 1.1rem;
        }

        .content-section {
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection

@push('scripts')
    <script>
        const backend = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";
        let detailModal, userDetailModal;
        let currentSection = 'overview';

        // ADMIN AUTH CHECK
        (function checkAdminAuth() {
            const token = localStorage.getItem('uipassport_token');
            const userStr = localStorage.getItem('uipassport_user');

            if (!token || !userStr) {
                window.location.replace('/login');
                return;
            }

            try {
                const user = JSON.parse(userStr);
                if (user.role !== 'admin') {
                    window.location.replace('/');
                    return;
                }
            } catch (e) {
                localStorage.removeItem('uipassport_token');
                localStorage.removeItem('uipassport_user');
                window.location.replace('/login');
            }
        })();

        document.addEventListener('DOMContentLoaded', function () {
            detailModal = new bootstrap.Modal(document.getElementById('detailModal'));
            userDetailModal = new bootstrap.Modal(document.getElementById('userDetailModal'));

            loadStatistics();
            loadRequirements();

            document.getElementById('updateStatusForm').addEventListener('submit', handleUpdateStatus);
        });

        function switchSection(section) {
            // Update sidebar active state
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`[data-section="${section}"]`).classList.add('active');

            // Hide all sections
            document.querySelectorAll('.content-section').forEach(sec => {
                sec.classList.add('d-none');
            });

            // Show selected section
            document.getElementById(`${section}Section`).classList.remove('d-none');
            currentSection = section;

            // Load data based on section
            if (section === 'requirements') {
                loadRequirements();
            } else if (section === 'users') {
                loadUsers();
            }
        }

        async function loadStatistics() {
            const token = localStorage.getItem('uipassport_token');

            try {
                // Load requirements statistics
                const reqRes = await fetch(`${backend}/api/requirements/all`, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                if (reqRes.ok) {
                    const data = await reqRes.json();
                    const diproses = data.filter(r => r.status === 'diproses').length;
                    const diterima = data.filter(r => r.status === 'diterima').length;
                    const ditolak = data.filter(r => r.status === 'ditolak').length;

                    document.getElementById('statDiproses').textContent = diproses;
                    document.getElementById('statDiterima').textContent = diterima;
                    document.getElementById('statDitolak').textContent = ditolak;

                    // Calculate total unique users from requirements
                    const uniqueEmails = new Set();
                    data.forEach(req => {
                        if (req.email) {
                            uniqueEmails.add(req.email);
                        }
                    });

                    document.getElementById('statTotalUsers').textContent = uniqueEmails.size;
                } else {
                    // Set default if request fails
                    document.getElementById('statTotalUsers').textContent = '0';
                }

            } catch (err) {
                console.error('Error loading statistics:', err);
                document.getElementById('statTotalUsers').textContent = '0';
            }
        }

        async function loadRequirements() {
            const token = localStorage.getItem('uipassport_token');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const tableContainer = document.getElementById('tableContainer');
            const emptyState = document.getElementById('emptyState');
            const alertEl = document.getElementById('dashboardAlert');

            alertEl.classList.add('d-none');
            loadingSpinner.classList.remove('d-none');
            tableContainer.classList.add('d-none');
            emptyState.classList.add('d-none');

            try {
                const res = await fetch(`${backend}/api/requirements/all`, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                const data = await res.json();

                if (!res.ok) {
                    throw new Error(data.message || 'Gagal memuat data');
                }

                loadingSpinner.classList.add('d-none');

                if (!data || data.length === 0) {
                    emptyState.classList.remove('d-none');
                    return;
                }

                const tbody = document.getElementById('requirementsTableBody');
                tbody.innerHTML = data.map((req, index) => `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${req.nama_lengkap || '-'}</td>
                                <td>${req.email || '-'}</td>
                                <td>${new Date(req.created_at).toLocaleDateString('id-ID')}</td>
                                <td>${getStatusBadge(req.status)}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary-custom" onclick="showDetail(${req.id})">
                                        <i class="bi bi-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                        `).join('');

                tableContainer.classList.remove('d-none');

            } catch (err) {
                console.error(err);
                loadingSpinner.classList.add('d-none');
                showAlert('danger', err.message || 'Terjadi kesalahan saat memuat data');
            }
        }

        async function loadUsers() {
            const token = localStorage.getItem('uipassport_token');
            const loadingUsers = document.getElementById('loadingUsers');
            const usersTableContainer = document.getElementById('usersTableContainer');
            const emptyUsers = document.getElementById('emptyUsers');

            loadingUsers.classList.remove('d-none');
            usersTableContainer.classList.add('d-none');
            emptyUsers.classList.add('d-none');

            try {
                // Gunakan endpoint baru untuk mendapatkan semua users
                const res = await fetch(`${backend}/api/users/all`, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                if (!res.ok) throw new Error('Gagal memuat data user');

                const users = await res.json();

                loadingUsers.classList.add('d-none');

                if (users.length === 0) {
                    emptyUsers.classList.remove('d-none');
                    return;
                }

                const tbody = document.getElementById('usersTableBody');
                tbody.innerHTML = users.map((user, index) => {
                    // Format tanggal lahir
                    const tglLahir = user.tanggal_lahir
                        ? new Date(user.tanggal_lahir).toLocaleDateString('id-ID')
                        : '-';

                    return `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${user.nama_lengkap || '-'}</td>
                            <td>${user.email || '-'}</td>
                            <td>${tglLahir}</td>
                            <td>${user.no_telepon || '-'}</td>
                            <td>${new Date(user.created_at).toLocaleDateString('id-ID')}</td>
                            <td>
                                <button class="btn btn-sm btn-primary-custom" onclick="showUserDetail(${user.id})">
                                    <i class="bi bi-eye"></i> Detail
                                </button>
                            </td>
                        </tr>
                    `;
                }).join('');

                usersTableContainer.classList.remove('d-none');

            } catch (err) {
                console.error('Error loading users:', err);
                loadingUsers.classList.add('d-none');
                showAlert('danger', 'Gagal memuat data user');
            }
        }

        async function showUserDetail(userId) {
            const token = localStorage.getItem('uipassport_token');

            try {
                // Gunakan endpoint baru
                const res = await fetch(`${backend}/api/users/${userId}`, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                if (!res.ok) throw new Error('User tidak ditemukan');

                const user = await res.json();

                // Format tanggal lahir
                const tglLahir = user.tanggal_lahir
                    ? new Date(user.tanggal_lahir).toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    })
                    : '-';

                document.getElementById('userDetailNama').textContent = user.nama_lengkap || '-';
                document.getElementById('userDetailEmail').textContent = user.email || '-';
                document.getElementById('userDetailTglLahir').textContent = tglLahir;
                document.getElementById('userDetailTempatLahir').textContent = user.tempat_lahir || '-';
                document.getElementById('userDetailTelepon').textContent = user.no_telepon || '-';
                document.getElementById('userDetailAlamat').textContent = user.alamat || '-';
                document.getElementById('userDetailJoined').textContent = new Date(user.created_at).toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                });

                userDetailModal.show();

            } catch (err) {
                console.error('Error showing user detail:', err);
                showAlert('danger', 'Gagal memuat detail user');
            }
        }

        function getStatusBadge(status) {
            const badges = {
                'diproses': '<span class="badge bg-warning">Sedang Diproses</span>',
                'diterima': '<span class="badge bg-success">Diterima</span>',
                'ditolak': '<span class="badge bg-danger">Ditolak</span>'
            };
            return badges[status] || '<span class="badge bg-secondary">-</span>';
        }

        function updateStatusBadgeElement(status) {
            const badgeElement = document.getElementById('detailStatusBadge');
            if (!badgeElement) return;

            const badges = {
                'diproses': { class: 'bg-warning', text: 'Sedang Diproses' },
                'diterima': { class: 'bg-success', text: 'Diterima' },
                'ditolak': { class: 'bg-danger', text: 'Ditolak' }
            };

            const config = badges[status] || { class: 'bg-secondary', text: '-' };
            badgeElement.className = `badge ${config.class}`;
            badgeElement.textContent = config.text;
        }

        // Di dalam fungsi showDetail, tambahkan setelah container documents
        async function showDetail(reqId) {
            const token = localStorage.getItem('uipassport_token');

            try {
                const res = await fetch(`${backend}/api/requirements/all`, {
                    headers: { 'Authorization': `Bearer ${token}` }
                });

                const data = await res.json();
                const requirement = data.find(r => r.id === reqId);

                if (!requirement) throw new Error('Data tidak ditemukan');

                document.getElementById('detailNama').textContent = requirement.nama_lengkap || '-';
                document.getElementById('detailEmail').textContent = requirement.email || '-';
                document.getElementById('detailTanggal').textContent = new Date(requirement.created_at).toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });

                updateStatusBadgeElement(requirement.status);

                // TAMBAHKAN HANDLE FOTO
                if (requirement.foto_path) {
                    document.getElementById('linkFoto').href = `${backend}/${requirement.foto_path}`;
                    document.getElementById('linkFoto').style.display = 'inline-block';
                } else {
                    document.getElementById('linkFoto').style.display = 'none';
                }

                if (requirement.ktp_path) {
                    document.getElementById('linkKTP').href = `${backend}/${requirement.ktp_path}`;
                    document.getElementById('linkKTP').style.display = 'inline-block';
                } else {
                    document.getElementById('linkKTP').style.display = 'none';
                }

                if (requirement.kk_path) {
                    document.getElementById('linkKK').href = `${backend}/${requirement.kk_path}`;
                    document.getElementById('linkKK').style.display = 'inline-block';
                } else {
                    document.getElementById('linkKK').style.display = 'none';
                }

                if (requirement.dokumen_path) {
                    document.getElementById('linkDokumen').href = `${backend}/${requirement.dokumen_path}`;
                    document.getElementById('linkDokumen').style.display = 'inline-block';
                } else {
                    document.getElementById('linkDokumen').style.display = 'none';
                }

                const containerPewarganegaraan = document.getElementById('containerSuratPewarganegaraan');
                const linkPewarganegaraan = document.getElementById('linkSuratPewarganegaraan');

                if (requirement.surat_pewarganegaraan_path) {
                    containerPewarganegaraan.classList.remove('d-none');
                    linkPewarganegaraan.href = `${backend}/${requirement.surat_pewarganegaraan_path}`;
                    linkPewarganegaraan.style.display = 'inline-block';
                } else {
                    containerPewarganegaraan.classList.add('d-none');
                }

                const containerGantiNama = document.getElementById('containerSuratGantiNama');
                const linkGantiNama = document.getElementById('linkSuratGantiNama');

                if (requirement.surat_ganti_nama_path) {
                    containerGantiNama.classList.remove('d-none');
                    linkGantiNama.href = `${backend}/${requirement.surat_ganti_nama_path}`;
                    linkGantiNama.style.display = 'inline-block';
                } else {
                    containerGantiNama.classList.add('d-none');
                }

                document.getElementById('requirementId').value = requirement.id;
                document.getElementById('statusSelect').value = requirement.status;
                document.getElementById('catatanAdmin').value = requirement.catatan_admin || '';

                detailModal.show();

            } catch (err) {
                console.error('Error in showDetail:', err);
                showAlert('danger', 'Gagal memuat detail: ' + err.message);
            }
        }

        async function handleUpdateStatus(e) {
            e.preventDefault();

            const token = localStorage.getItem('uipassport_token');
            const reqId = document.getElementById('requirementId').value;
            const status = document.getElementById('statusSelect').value;
            const catatan = document.getElementById('catatanAdmin').value;
            const spinner = document.getElementById('updateSpinner');
            const submitBtn = document.querySelector('#updateStatusForm button[type="submit"]');

            spinner.classList.remove('d-none');
            submitBtn.disabled = true;

            try {
                const res = await fetch(`${backend}/api/requirements/${reqId}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({
                        status,
                        catatan_admin: catatan || null
                    })
                });

                const data = await res.json();

                if (!res.ok) {
                    throw new Error(data.message || 'Gagal update status');
                }

                detailModal.hide();
                showAlert('success', 'Status berhasil diperbarui');

                setTimeout(() => {
                    loadStatistics();
                    loadRequirements();
                }, 1500);

            } catch (err) {
                console.error(err);
                showAlert('danger', 'Gagal update status: ' + err.message);
            } finally {
                spinner.classList.add('d-none');
                submitBtn.disabled = false;
            }
        }

        function showAlert(type, message) {
            const alertEl = document.getElementById('dashboardAlert');
            const icon = type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill';

            alertEl.className = `alert alert-${type}`;
            alertEl.innerHTML = `
                        <div class="d-flex align-items-center">
                            <i class="bi bi-${icon} me-2"></i>
                            <div>${message}</div>
                        </div>
                    `;
            alertEl.classList.remove('d-none');

            setTimeout(() => alertEl.classList.add('d-none'), 3000);
        }
    </script>
@endpush