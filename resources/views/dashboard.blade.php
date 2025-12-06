@extends('layouts.app')

@section('content')
    <section class="section"
        style="padding-top: 2rem; padding-bottom: 4.5rem; min-height: 100vh; background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <!-- Header -->
            <div class="mb-4" data-aos="fade-down">
                <h2 class="fw-bold mb-2">
                    <i class="bi bi-speedometer2 text-primary me-2"></i>Dashboard Admin
                </h2>
                <p class="text-muted">Kelola semua pengajuan persyaratan paspor</p>
            </div>

            <!-- Alert -->
            <div id="dashboardAlert" class="alert d-none" role="alert"></div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card text-center">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-hourglass-split text-warning" style="font-size: 2rem;"></i>
                        </div>
                        <h3 class="fw-bold mb-1" id="statDiproses">0</h3>
                        <p class="text-muted mb-0">Sedang Diproses</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                    <div class="feature-card text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-check-circle text-success" style="font-size: 2rem;"></i>
                        </div>
                        <h3 class="fw-bold mb-1" id="statDiterima">0</h3>
                        <p class="text-muted mb-0">Diterima</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card text-center">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 70px; height: 70px;">
                            <i class="bi bi-x-circle text-danger" style="font-size: 2rem;"></i>
                        </div>
                        <h3 class="fw-bold mb-1" id="statDitolak">0</h3>
                        <p class="text-muted mb-0">Ditolak</p>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="feature-card" data-aos="fade-up" data-aos-delay="250">
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
                                <!-- Data akan dimuat via JavaScript -->
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
    </section>

    <!-- Modal Detail & Update Status -->
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
@endsection

@push('scripts')
    <script>
        const backend = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";
        let detailModal;

        // Untuk DASHBOARD (Admin Only)
(function checkAdminAuth() {
    const token = localStorage.getItem('uipassport_token');
    const userStr = localStorage.getItem('uipassport_user');

    if (!token || !userStr) {
        console.log('No auth, redirecting to login');
        window.location.replace('/login');
        return;
    }

    try {
        const user = JSON.parse(userStr);
        if (user.role !== 'admin') {
            console.log('Not admin, redirecting to home');
            window.location.replace('/');
            return;
        }
    } catch (e) {
        console.error('Invalid user data');
        localStorage.removeItem('uipassport_token');
        localStorage.removeItem('uipassport_user');
        window.location.replace('/login');
    }
})();

        document.addEventListener('DOMContentLoaded', function () {
            // Check if user is admin
            const token = localStorage.getItem('uipassport_token');
            const userStr = localStorage.getItem('uipassport_user');

            if (!token || !userStr) {
                window.location.href = '/login';
                return;
            }

            try {
                const user = JSON.parse(userStr);
                if (user.role !== 'admin') {
                    window.location.href = '/';
                    return;
                }
            } catch (e) {
                window.location.href = '/login';
                return;
            }

            // Initialize modal
            detailModal = new bootstrap.Modal(document.getElementById('detailModal'));

            // Load requirements
            loadRequirements();

            // Handle update status form
            document.getElementById('updateStatusForm').addEventListener('submit', handleUpdateStatus);
        });

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
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                const data = await res.json();

                if (!res.ok) {
                    throw new Error(data.message || 'Gagal memuat data');
                }

                loadingSpinner.classList.add('d-none');

                if (!data || data.length === 0) {
                    emptyState.classList.remove('d-none');
                    updateStatistics([], 0, 0, 0);
                    return;
                }

                // Calculate statistics
                const diproses = data.filter(r => r.status === 'diproses').length;
                const diterima = data.filter(r => r.status === 'diterima').length;
                const ditolak = data.filter(r => r.status === 'ditolak').length;

                updateStatistics(data, diproses, diterima, ditolak);

                // Populate table
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
                alertEl.className = 'alert alert-danger';
                alertEl.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div>${err.message || 'Terjadi kesalahan saat memuat data'}</div>
                </div>
            `;
                alertEl.classList.remove('d-none');
            }
        }

        function updateStatistics(data, diproses, diterima, ditolak) {
            document.getElementById('statDiproses').textContent = diproses;
            document.getElementById('statDiterima').textContent = diterima;
            document.getElementById('statDitolak').textContent = ditolak;
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

        async function showDetail(reqId) {
            const token = localStorage.getItem('uipassport_token');

            try {
                const res = await fetch(`${backend}/api/requirements/all`, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                const data = await res.json();
                const requirement = data.find(r => r.id === reqId);

                if (!requirement) {
                    throw new Error('Data tidak ditemukan');
                }

                console.log('Requirement data:', requirement); // Debug

                // Populate modal
                document.getElementById('detailNama').textContent = requirement.nama_lengkap || '-';
                document.getElementById('detailEmail').textContent = requirement.email || '-';
                document.getElementById('detailTanggal').textContent = new Date(requirement.created_at).toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                // Update status badge correctly
                updateStatusBadgeElement(requirement.status);

                // Set document links - cek dulu apakah path ada
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

                // Optional documents
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

                // Set form values
                document.getElementById('requirementId').value = requirement.id;
                document.getElementById('statusSelect').value = requirement.status;
                document.getElementById('catatanAdmin').value = requirement.catatan_admin || '';

                detailModal.show();

            } catch (err) {
                console.error('Error in showDetail:', err);
                alert('Gagal memuat detail: ' + err.message);
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

                // Close modal
                detailModal.hide();

                // Show success message
                const alertEl = document.getElementById('dashboardAlert');
                alertEl.className = 'alert alert-success';
                alertEl.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>Status berhasil diperbarui</div>
                </div>
            `;
                alertEl.classList.remove('d-none');

                // Reload data
                setTimeout(() => {
                    alertEl.classList.add('d-none');
                    loadRequirements();
                }, 2000);

            } catch (err) {
                console.error(err);
                alert('Gagal update status: ' + err.message);
            } finally {
                spinner.classList.add('d-none');
                submitBtn.disabled = false;
            }
        }
    </script>
@endpush