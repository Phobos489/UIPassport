@extends('layouts.app')

@section('content')
    <section class="section"
        style="padding-top: 2rem; padding-bottom: 4.5rem; min-height: 100vh; background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <div class="row justify-content-center mb-30">
                <!-- Header -->
                <div class="mb-4 text-center" data-aos="fade-down">
                    <h2 class="fw-bold mb-2">
                        <i class="bi bi-file-earmark-arrow-up text-primary me-2"></i>
                        Formulir Pengajuan Persyaratan Paspor
                    </h2>
                    <p class="text-muted">Lengkapi dan unggah dokumen persyaratan Anda di bawah ini</p>
                </div>

                <!-- Form Card -->
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <form id="requirementForm" enctype="multipart/form-data">
                        <!-- KTP -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-person-vcard text-primary me-2"></i>
                                KTP <span class="text-danger">*</span>
                            </label>
                            <p class="small text-muted mb-2">Upload scan atau foto KTP yang masih berlaku (JPG, PNG, PDF -
                                Max 5MB)</p>
                            <div class="upload-area" onclick="document.getElementById('ktp').click()">
                                <input type="file" id="ktp" name="ktp" accept=".jpg,.jpeg,.png,.pdf" required hidden
                                    onchange="handleFileSelect(this, 'ktpPreview')">
                                <div id="ktpPreview" class="preview-content">
                                    <i class="bi bi-cloud-upload" style="font-size: 3rem; color: var(--primary);"></i>
                                    <p class="mb-0 mt-2"><strong>Klik untuk upload KTP</strong></p>
                                    <p class="small text-muted mb-0">atau drag & drop file di sini</p>
                                </div>
                            </div>
                        </div>

                        <!-- KK -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-people text-success me-2"></i>
                                Kartu Keluarga (KK) <span class="text-danger">*</span>
                            </label>
                            <p class="small text-muted mb-2">Upload scan atau foto Kartu Keluarga (JPG, PNG, PDF - Max 5MB)
                            </p>
                            <div class="upload-area" onclick="document.getElementById('kk').click()">
                                <input type="file" id="kk" name="kk" accept=".jpg,.jpeg,.png,.pdf" required hidden
                                    onchange="handleFileSelect(this, 'kkPreview')">
                                <div id="kkPreview" class="preview-content">
                                    <i class="bi bi-cloud-upload" style="font-size: 3rem; color: var(--success);"></i>
                                    <p class="mb-0 mt-2"><strong>Klik untuk upload KK</strong></p>
                                    <p class="small text-muted mb-0">atau drag & drop file di sini</p>
                                </div>
                            </div>
                        </div>

                        <!-- Dokumen Paspor -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-file-earmark-text text-warning me-2"></i>
                                Dokumen Paspor (Foto 4x6) <span class="text-danger">*</span>
                            </label>
                            <p class="small text-muted mb-2">Upload foto ukuran 4x6 cm dengan latar belakang putih/terang
                                (JPG, PNG, PDF - Max 5MB)</p>
                            <div class="upload-area" onclick="document.getElementById('dokumen').click()">
                                <input type="file" id="dokumen" name="dokumen" accept=".jpg,.jpeg,.png,.pdf" required hidden
                                    onchange="handleFileSelect(this, 'dokumenPreview')">
                                <div id="dokumenPreview" class="preview-content">
                                    <i class="bi bi-cloud-upload" style="font-size: 3rem; color: var(--warning);"></i>
                                    <p class="mb-0 mt-2"><strong>Klik untuk upload Dokumen Paspor</strong></p>
                                    <p class="small text-muted mb-0">atau drag & drop file di sini</p>
                                </div>
                            </div>
                        </div>

                        <!-- Surat Pewarganegaraan (Optional) -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-file-earmark-check text-info me-2"></i>
                                Surat Pewarganegaraan <span class="text-muted">(Opsional)</span>
                            </label>
                            <p class="small text-muted mb-2">Jika ada, upload surat pewarganegaraan (JPG, PNG, PDF - Max
                                5MB)</p>
                            <div class="upload-area" onclick="document.getElementById('surat_pewarganegaraan').click()">
                                <input type="file" id="surat_pewarganegaraan" name="surat_pewarganegaraan"
                                    accept=".jpg,.jpeg,.png,.pdf" hidden
                                    onchange="handleFileSelect(this, 'pewarganegaraanPreview')">
                                <div id="pewarganegaraanPreview" class="preview-content">
                                    <i class="bi bi-cloud-upload" style="font-size: 3rem; color: var(--info);"></i>
                                    <p class="mb-0 mt-2"><strong>Klik untuk upload (Opsional)</strong></p>
                                    <p class="small text-muted mb-0">atau drag & drop file di sini</p>
                                </div>
                            </div>
                        </div>

                        <!-- Surat Ganti Nama (Optional) -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-file-earmark-person text-secondary me-2"></i>
                                Surat Ganti Nama <span class="text-muted">(Opsional)</span>
                            </label>
                            <p class="small text-muted mb-2">Jika pernah ganti nama, upload surat keterangan ganti nama
                                (JPG, PNG, PDF - Max 5MB)</p>
                            <div class="upload-area" onclick="document.getElementById('surat_ganti_nama').click()">
                                <input type="file" id="surat_ganti_nama" name="surat_ganti_nama"
                                    accept=".jpg,.jpeg,.png,.pdf" hidden
                                    onchange="handleFileSelect(this, 'gantiNamaPreview')">
                                <div id="gantiNamaPreview" class="preview-content">
                                    <i class="bi bi-cloud-upload" style="font-size: 3rem; color: var(--secondary);"></i>
                                    <p class="mb-0 mt-2"><strong>Klik untuk upload (Opsional)</strong></p>
                                    <p class="small text-muted mb-0">atau drag & drop file di sini</p>
                                </div>
                            </div>
                        </div>

                        <!-- Info Box -->
                        <div class="alert alert-info d-flex align-items-start mb-4">
                            <i class="bi bi-info-circle-fill me-3 fs-4"></i>
                            <div>
                                <strong>Catatan Penting:</strong>
                                <ul class="mb-0 mt-2 small">
                                    <li>Pastikan semua dokumen terlihat jelas dan tidak buram</li>
                                    <li>Format file yang diterima: JPG, PNG, atau PDF</li>
                                    <li>Ukuran maksimal file: 5MB per dokumen</li>
                                    <li>Dokumen yang sudah diunggah akan diverifikasi oleh admin</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Alert -->
                        <div id="formAlert" class="alert d-none mb-4" role="alert"></div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('/profile') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Kembali ke Profil
                            </a>
                            <button type="submit" class="btn btn-primary-custom btn-lg px-5">
                                <span class="spinner-border spinner-border-sm d-none" id="submitSpinner"></span>
                                <i class="bi bi-send me-2"></i>Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
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

        .preview-content {
            pointer-events: none;
        }

        .file-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .file-name {
            font-weight: 600;
            color: var(--dark);
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .remove-file {
            background: var(--danger);
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            pointer-events: all;
        }

        .remove-file:hover {
            background: #c82333;
            transform: scale(1.1);
        }
    </style>
@endsection

@push('scripts')
    <script>
        const backend = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";

        document.addEventListener('DOMContentLoaded', function () {
            // Check if user is authenticated
            const token = localStorage.getItem('uipassport_token');
            const userStr = localStorage.getItem('uipassport_user');

            if (!token || !userStr) {
                window.location.href = '/login';
                return;
            }

            try {
                const user = JSON.parse(userStr);
                if (user.role !== 'user') {
                    window.location.href = '/dashboard';
                    return;
                }
            } catch (e) {
                window.location.href = '/login';
                return;
            }

            // Check if already submitted
            checkExistingSubmission();

            // Handle form submit
            document.getElementById('requirementForm').addEventListener('submit', handleSubmit);
        });

        async function checkExistingSubmission() {
            const token = localStorage.getItem('uipassport_token');

            try {
                const res = await fetch(`${backend}/api/requirements/my-requirements`, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                const data = await res.json();

                if (res.ok && data && data.length > 0) {
                    // User already submitted
                    const alertEl = document.getElementById('formAlert');
                    alertEl.className = 'alert alert-warning';
                    alertEl.innerHTML = `
                        <div class="d-flex align-items-start">
                            <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
                            <div>
                                <strong>Anda sudah mengajukan persyaratan sebelumnya</strong>
                                <p class="mb-0 mt-2">Silakan cek status pengajuan Anda di halaman <a href="/profile" class="alert-link">Profil</a>. Jika ingin mengajukan ulang, hubungi admin terlebih dahulu.</p>
                            </div>
                        </div>
                    `;
                    alertEl.classList.remove('d-none');

                    // Disable form
                    document.getElementById('requirementForm').querySelectorAll('input, button').forEach(el => {
                        el.disabled = true;
                    });
                }
            } catch (err) {
                console.error('Error checking submission:', err);
            }
        }

        function handleFileSelect(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);
            const uploadArea = preview.closest('.upload-area');

            if (!file) return;

            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 5MB');
                input.value = '';
                return;
            }

            // Validate file type
            const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'];
            if (!validTypes.includes(file.type)) {
                alert('Format file tidak valid. Gunakan JPG, PNG, atau PDF');
                input.value = '';
                return;
            }

            // Update preview
            uploadArea.classList.add('has-file');

            const icon = file.type === 'application/pdf' ? 'file-pdf' : 'file-image';
            const color = file.type === 'application/pdf' ? 'danger' : 'success';

            preview.innerHTML = `
                <div class="file-info">
                    <i class="bi bi-${icon}-fill text-${color}" style="font-size: 2rem;"></i>
                    <div>
                        <p class="file-name mb-0">${file.name}</p>
                        <small class="text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                    </div>
                    <button type="button" class="remove-file" onclick="removeFile('${input.id}', '${previewId}')">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            `;
        }

        function removeFile(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const uploadArea = preview.closest('.upload-area');

            input.value = '';
            uploadArea.classList.remove('has-file');

            const icons = {
                'ktpPreview': { icon: 'cloud-upload', color: 'primary', label: 'KTP' },
                'kkPreview': { icon: 'cloud-upload', color: 'success', label: 'KK' },
                'dokumenPreview': { icon: 'cloud-upload', color: 'warning', label: 'Dokumen Paspor' },
                'pewarganegaraanPreview': { icon: 'cloud-upload', color: 'info', label: '(Opsional)' },
                'gantiNamaPreview': { icon: 'cloud-upload', color: 'secondary', label: '(Opsional)' }
            };

            const config = icons[previewId];

            preview.innerHTML = `
                <i class="bi bi-${config.icon}" style="font-size: 3rem; color: var(--${config.color});"></i>
                <p class="mb-0 mt-2"><strong>Klik untuk upload ${config.label}</strong></p>
                <p class="small text-muted mb-0">atau drag & drop file di sini</p>
            `;
        }

        async function handleSubmit(e) {
            e.preventDefault();

            const token = localStorage.getItem('uipassport_token');
            const formData = new FormData();

            const ktp = document.getElementById('ktp').files[0];
            const kk = document.getElementById('kk').files[0];
            const dokumen = document.getElementById('dokumen').files[0];
            const pewarganegaraan = document.getElementById('surat_pewarganegaraan').files[0];
            const gantiNama = document.getElementById('surat_ganti_nama').files[0];

            if (!ktp || !kk || !dokumen) {
                showAlert('danger', 'KTP, KK, dan Dokumen Paspor wajib diunggah');
                return;
            }

            formData.append('ktp', ktp);
            formData.append('kk', kk);
            formData.append('dokumen', dokumen);

            if (pewarganegaraan) formData.append('surat_pewarganegaraan', pewarganegaraan);
            if (gantiNama) formData.append('surat_ganti_nama', gantiNama);

            const spinner = document.getElementById('submitSpinner');
            const submitBtn = document.querySelector('#requirementForm button[type="submit"]');

            spinner.classList.remove('d-none');
            submitBtn.disabled = true;

            try {
                const res = await fetch(`${backend}/api/requirements/submit`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`
                    },
                    body: formData
                });

                const data = await res.json();

                if (!res.ok) {
                    throw new Error(data.message || 'Gagal mengirim pengajuan');
                }

                // Success
                showAlert('success', 'Pengajuan berhasil dikirim! Anda akan diarahkan ke halaman profil...');

                setTimeout(() => {
                    window.location.href = '/profile';
                }, 2000);

            } catch (err) {
                console.error(err);
                showAlert('danger', err.message || 'Terjadi kesalahan saat mengirim pengajuan');
            } finally {
                spinner.classList.add('d-none');
                submitBtn.disabled = false;
            }
        }

        function showAlert(type, message) {
            const alertEl = document.getElementById('formAlert');
            const icon = type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill';

            alertEl.className = `alert alert-${type}`;
            alertEl.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="bi bi-${icon} me-2"></i>
                    <div>${message}</div>
                </div>
            `;
            alertEl.classList.remove('d-none');

            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
@endpush