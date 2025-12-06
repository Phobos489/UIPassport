@extends('layouts.app')

@section('content')
<section class="section d-flex align-items-center justify-content-center"
    style="min-height: calc(100vh - 76px); background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="feature-card text-center" data-aos="zoom-in" data-aos-delay="100">
                    <!-- 404 Illustration -->
                    <div class="mb-4">
                        <div class="position-relative d-inline-block">
                            <h1 class="display-1 fw-bold text-primary mb-0" style="font-size: 8rem; opacity: 0.1;">
                                404
                            </h1>
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <i class="bi bi-exclamation-triangle text-warning" style="font-size: 5rem;"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <h2 class="fw-bold mb-3">Halaman Tidak Ditemukan</h2>
                    <p class="text-muted mb-4 px-md-5">
                        Maaf, halaman yang Anda cari tidak dapat ditemukan atau Anda tidak memiliki akses untuk melihat halaman ini.
                    </p>

                    <!-- Common Reasons -->
                    <div class="alert alert-info text-start mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-info-circle-fill me-3 fs-5"></i>
                            <div>
                                <strong class="d-block mb-2">Kemungkinan penyebab:</strong>
                                <ul class="small mb-0 ps-3">
                                    <li>URL yang Anda masukkan salah atau tidak valid</li>
                                    <li>Halaman telah dipindahkan atau dihapus</li>
                                    <li>Anda tidak memiliki izin untuk mengakses halaman ini</li>
                                    <li>Anda perlu login terlebih dahulu untuk mengakses halaman ini</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center" data-aos="fade-up" data-aos-delay="300">
                        <a href="{{ url('/') }}" class="btn btn-primary-custom px-4 py-2">
                            <i class="bi bi-house-door me-2"></i>Kembali ke Beranda
                        </a>
                        <button onclick="window.history.back()" class="btn btn-outline-primary-custom px-4 py-2">
                            <i class="bi bi-arrow-left me-2"></i>Halaman Sebelumnya
                        </button>
                    </div>

                    <!-- Help Link -->
                    <div class="mt-4 pt-3 border-top" data-aos="fade-up" data-aos-delay="400">
                        <p class="text-muted small mb-2">
                            <i class="bi bi-question-circle me-1"></i>
                            Butuh bantuan?
                        </p>
                        <a href="mailto:imigrasi@passport.com" class="text-primary text-decoration-none fw-semibold small">
                            Hubungi Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom styling untuk halaman 404 */
    .display-1 {
        line-height: 1;
    }
    
    .feature-card {
        animation: fadeInUp 0.6s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection