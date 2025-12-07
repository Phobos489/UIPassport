@extends('layouts.app')

@section('content')

    <section class="hero text-center text-white position-relative">
        <div class="container position-relative" style="z-index: 1;">
            <div data-aos="fade-up" data-aos-delay="100">
                <h1 class="display-4 fw-bold mb-4">Pembuatan Paspor<br>Lebih Mudah & Cepat</h1>
                <p class="lead mb-5" style="max-width: 700px; margin: 0 auto; font-size: 1.2rem;">
                    Panduan lengkap dan terpercaya untuk proses pembuatan paspor Anda. Kami siap membantu setiap langkah
                    perjalanan Anda.
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#requirements" class="btn btn-light btn-lg px-5 py-3"
                        style="border-radius: 50px; font-weight: 600;">
                        <i class="bi bi-file-text me-2"></i>Lihat Persyaratan
                    </a>
                    <button onclick="handleDynamicNavigation()" class="btn btn-outline-light btn-lg px-5 py-3"
                        style="border-radius: 50px; font-weight: 600; border-width: 2px;">
                        <i class="bi bi-pencil-square me-2"></i>Daftar Sekarang
                    </button>
                </div>
            </div>

            <!-- Statistics -->
            <div class="row mt-5 pt-4 g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4"
                        style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border-radius: 1rem;">
                        <h2 class="fw-bold mb-2" id="statTotalPaspor">
                            <span class="spinner-border spinner-border-sm"></span>
                        </h2>
                        <p class="mb-0">Paspor Diproses</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4"
                        style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border-radius: 1rem;">
                        <h2 class="fw-bold mb-2" id="statKepuasan">
                            <span class="spinner-border spinner-border-sm"></span>
                        </h2>
                        <p class="mb-0">Tingkat Diterima</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="p-4"
                        style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border-radius: 1rem;">
                        <h2 class="fw-bold mb-2">7-14</h2>
                        <p class="mb-0">Hari Proses</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="overview" class="section" style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="mb-4" data-aos="fade-right">
                        <span class="badge bg-primary px-3 py-2 mb-3" style="border-radius: 50px; font-weight: 600;">
                            <i class="bi bi-info-circle me-1"></i>Tentang Paspor
                        </span>
                        <h2 class="display-5 fw-bold mb-3">Informasi Lengkap Pembuatan Paspor</h2>
                        <p class="text-muted fs-5 mb-4">
                            Paspor adalah dokumen resmi perjalanan internasional yang wajib dimiliki. Kami menyediakan
                            panduan lengkap untuk memudahkan proses Anda.
                        </p>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-6" data-aos="fade-right" data-aos-delay="100">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-shield-check text-primary" style="font-size: 1.5rem;"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">Jenis Paspor</h6>
                                    <p class="small text-muted mb-0">Biasa & Elektronik</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" data-aos="fade-right" data-aos-delay="150">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-clock-history text-success" style="font-size: 1.5rem;"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">Masa Berlaku</h6>
                                    <p class="small text-muted mb-0">5 Tahun</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-hourglass-split text-warning" style="font-size: 1.5rem;"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">Waktu Proses</h6>
                                    <p class="small text-muted mb-0">7-14 Hari Kerja</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" data-aos="fade-right" data-aos-delay="250">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-file-earmark-text text-danger" style="font-size: 1.5rem;"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">Tips & Dokumen</h6>
                                    <p class="small text-muted mb-0">Panduan Lengkap</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="position-relative">
                        <!-- Ganti dengan gambar dari public/image/profile.png -->
                        <img src="{{ asset('image/profile.jpg') }}" alt="Preview Paspor"
                            class="img-fluid rounded-4 shadow-lg"
                            style="max-height: 400px; object-fit: cover; width: 100%;">

                        <div class="position-absolute bottom-0 end-0 m-4 bg-white rounded-3 shadow p-3"
                            style="max-width: 200px;">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success fs-3 me-2"></i>
                                <div>
                                    <div class="fw-bold">Terverifikasi</div>
                                    <small class="text-muted">Resmi & Terpercaya</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="requirements" class="section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary px-3 py-2 mb-3" style="border-radius: 50px; font-weight: 600;">
                    <i class="bi bi-list-check me-1"></i>Persyaratan
                </span>
                <h2 class="display-5 fw-bold mb-3">Dokumen yang Diperlukan</h2>
                <p class="text-muted fs-5" style="max-width: 600px; margin: 0 auto;">
                    Siapkan dokumen berikut untuk memudahkan proses pendaftaran paspor Anda
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-person-vcard text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="mb-0">KTP & KK</h5>
                        </div>
                        <p class="text-muted mb-0">
                            KTP asli dan fotokopi yang masih berlaku. Kartu Keluarga diperlukan untuk verifikasi data
                            keluarga dan kesesuaian informasi.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="feature-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-camera text-success" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="mb-0">Foto Paspor</h5>
                        </div>
                        <p class="text-muted mb-0">
                            Foto terbaru berwarna dengan latar belakang putih/terang, ekspresi netral, ukuran 4x6 cm sesuai
                            ketentuan resmi imigrasi.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-file-earmark-plus text-warning" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="mb-0">Dokumen Tambahan</h5>
                        </div>
                        <p class="text-muted mb-0">
                            Surat ganti nama, akta kelahiran, surat izin orang tua (untuk anak), atau dokumen pendukung lain
                            sesuai kondisi khusus.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
                    <div class="feature-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-danger bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-credit-card text-danger" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="mb-0">Biaya Pembuatan</h5>
                        </div>
                        <p class="text-muted mb-0">
                            Persiapkan biaya sesuai jenis paspor yang dipilih. Pembayaran dapat dilakukan melalui bank atau
                            loket yang tersedia.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-info bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-envelope-paper text-info" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="mb-0">Email Aktif</h5>
                        </div>
                        <p class="text-muted mb-0">
                            Alamat email aktif untuk menerima notifikasi status pendaftaran, jadwal kedatangan, dan
                            pemberitahuan penting lainnya.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="350">
                    <div class="feature-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-secondary bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-phone text-secondary" style="font-size: 2rem;"></i>
                            </div>
                            <h5 class="mb-0">Nomor Telepon</h5>
                        </div>
                        <p class="text-muted mb-0">
                            Nomor telepon aktif yang dapat dihubungi untuk keperluan konfirmasi jadwal dan informasi penting
                            terkait paspor Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how" class="section" style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary px-3 py-2 mb-3" style="border-radius: 50px; font-weight: 600;">
                    <i class="bi bi-list-ol me-1"></i>Langkah-Langkah
                </span>
                <h2 class="display-5 fw-bold mb-3">Cara Daftar Paspor</h2>
                <p class="text-muted fs-5" style="max-width: 600px; margin: 0 auto;">
                    Ikuti 6 langkah mudah ini untuk membuat paspor Anda
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 48px; height: 48px; font-weight: 700; font-size: 1.2rem;">
                                        1
                                    </div>
                                </div>
                                <div class="ms-4">
                                    <h5 class="fw-bold mb-2">Kunjungi Situs Resmi</h5>
                                    <p class="text-muted mb-0">
                                        Akses situs resmi imigrasi atau datang langsung ke kantor imigrasi terdekat untuk
                                        memulai proses pendaftaran.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-left" data-aos-delay="100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 48px; height: 48px; font-weight: 700; font-size: 1.2rem;">
                                        2
                                    </div>
                                </div>
                                <div class="ms-4">
                                    <h5 class="fw-bold mb-2">Siapkan Dokumen</h5>
                                    <p class="text-muted mb-0">
                                        Persiapkan semua dokumen persyaratan dan foto sesuai ketentuan yang telah
                                        ditetapkan.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 48px; height: 48px; font-weight: 700; font-size: 1.2rem;">
                                        3
                                    </div>
                                </div>
                                <div class="ms-4">
                                    <h5 class="fw-bold mb-2">Buat Akun & Isi Formulir</h5>
                                    <p class="text-muted mb-0">
                                        Daftar akun jika mendaftar online, kemudian lengkapi formulir pendaftaran dengan
                                        data yang benar.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 48px; height: 48px; font-weight: 700; font-size: 1.2rem;">
                                        4
                                    </div>
                                </div>
                                <div class="ms-4">
                                    <h5 class="fw-bold mb-2">Upload & Bayar</h5>
                                    <p class="text-muted mb-0">
                                        Unggah semua dokumen yang diperlukan, lakukan pembayaran, dan pilih jadwal pelayanan
                                        yang tersedia.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-right" data-aos-delay="300">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 48px; height: 48px; font-weight: 700; font-size: 1.2rem;">
                                        5
                                    </div>
                                </div>
                                <div class="ms-4">
                                    <h5 class="fw-bold mb-2">Verifikasi Data</h5>
                                    <p class="text-muted mb-0">
                                        Datang sesuai jadwal untuk verifikasi dokumen, foto, dan pengambilan sidik jari di
                                        kantor imigrasi.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" data-aos="fade-left" data-aos-delay="300">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 48px; height: 48px; font-weight: 700; font-size: 1.2rem;">
                                        6
                                    </div>
                                </div>
                                <div class="ms-4">
                                    <h5 class="fw-bold mb-2">Ambil Paspor</h5>
                                    <p class="text-muted mb-0">
                                        Ambil paspor setelah mendapat pemberitahuan selesai, atau terima melalui pos jika
                                        layanan tersedia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge bg-primary px-3 py-2 mb-3" style="border-radius: 50px; font-weight: 600;">
                    <i class="bi bi-question-circle me-1"></i>FAQ
                </span>
                <h2 class="display-5 fw-bold mb-3">Pertanyaan Umum</h2>
                <p class="text-muted fs-5" style="max-width: 600px; margin: 0 auto;">
                    Temukan jawaban untuk pertanyaan yang sering diajukan
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3 shadow-sm" style="border-radius: 1rem; overflow: hidden;"
                            data-aos="fade-up" data-aos-delay="100">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1" style="border-radius: 1rem;">
                                    <i class="bi bi-clock-history text-primary me-3"></i>
                                    Berapa lama proses pembuatan paspor?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Waktu standar pembuatan paspor biasanya memakan waktu 7-14 hari kerja sejak verifikasi
                                    data selesai. Namun, durasi dapat bervariasi tergantung pada beban kerja kantor imigrasi
                                    dan jenis layanan yang Anda pilih. Untuk keperluan mendesak, beberapa kantor menyediakan
                                    layanan percepatan dengan biaya tambahan.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm" style="border-radius: 1rem; overflow: hidden;"
                            data-aos="fade-up" data-aos-delay="150">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2" style="border-radius: 1rem;">
                                    <i class="bi bi-people text-success me-3"></i>
                                    Bisakah mendaftar untuk anak di bawah umur?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Ya, pembuatan paspor untuk anak di bawah umur sangat dimungkinkan. Anda perlu menyiapkan
                                    akta kelahiran anak, KTP dan KK orang tua/wali, serta surat persetujuan dari kedua orang
                                    tua. Anak wajib hadir saat verifikasi data dan pengambilan foto. Masa berlaku paspor
                                    anak biasanya lebih pendek dibanding paspor dewasa.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm" style="border-radius: 1rem; overflow: hidden;"
                            data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3" style="border-radius: 1rem;">
                                    <i class="bi bi-credit-card text-warning me-3"></i>
                                    Bagaimana cara pembayaran biaya pembuatan?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Pembayaran dapat dilakukan melalui beberapa metode: transfer bank ke rekening resmi
                                    imigrasi, pembayaran di loket kantor imigrasi, atau melalui payment gateway online jika
                                    mendaftar secara daring. Pastikan untuk menyimpan bukti pembayaran dengan baik karena
                                    akan diperlukan saat verifikasi. Biaya berbeda tergantung jenis paspor yang Anda pilih.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 mb-3 shadow-sm" style="border-radius: 1rem; overflow: hidden;"
                            data-aos="fade-up" data-aos-delay="250">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4" style="border-radius: 1rem;">
                                    <i class="bi bi-globe text-danger me-3"></i>
                                    Apa perbedaan paspor biasa dan elektronik?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Paspor elektronik (e-Passport) memiliki chip elektronik yang menyimpan data biometrik
                                    pemegang paspor, memberikan keamanan lebih tinggi dan mempercepat proses imigrasi di
                                    berbagai negara. Paspor biasa tidak memiliki chip ini. Saat ini Indonesia sudah
                                    menerapkan e-Passport untuk semua pembuatan paspor baru, sehingga paspor yang Anda
                                    terima akan otomatis bertipe elektronik.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm" style="border-radius: 1rem; overflow: hidden;"
                            data-aos="fade-up" data-aos-delay="300">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq5" style="border-radius: 1rem;">
                                    <i class="bi bi-arrow-repeat text-info me-3"></i>
                                    Bagaimana jika paspor hilang atau rusak?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Jika paspor hilang, segera laporkan ke kantor polisi untuk mendapatkan surat kehilangan.
                                    Jika rusak, bawa paspor lama Anda. Selanjutnya, ajukan permohonan paspor baru dengan
                                    melampirkan surat kehilangan/paspor rusak beserta dokumen persyaratan standar lainnya.
                                    Proses pembuatan akan sama seperti pembuatan paspor baru pada umumnya.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 text-white mb-4 mb-lg-0">
                    <h3 class="fw-bold mb-2">Siap Membuat Paspor Anda?</h3>
                    <p class="mb-0 opacity-90">Mulai proses pendaftaran sekarang dan wujudkan rencana perjalanan
                        internasional Anda!</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <button onclick="handleDynamicNavigation()" class="btn btn-light btn-lg px-5 py-3"
                        style="border-radius: 50px; font-weight: 600;">
                        <i class="bi bi-arrow-right-circle me-2"></i>Daftar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    @push('scripts')
        <script>
            // Load statistics on page load
            document.addEventListener('DOMContentLoaded', async function () {
                await loadStatistics();
            });

            async function loadStatistics() {
                const backend = "{{ env('BACKEND_URL', 'http://localhost:3000') }}";

                try {
                    // Fetch statistics from backend WITHOUT token
                    const res = await fetch(`${backend}/api/requirements/statistics`);

                    if (!res.ok) {
                        // If failed, use fallback data
                        throw new Error('Failed to fetch statistics');
                    }

                    const data = await res.json();

                    // Update statistics in HTML
                    document.getElementById('statTotalPaspor').textContent =
                        data.total > 1000 ? (data.total / 1000).toFixed(1) + 'K+' : data.total;

                    // Calculate acceptance rate
                    const acceptanceRate = data.total > 0
                        ? Math.round((data.diterima / data.total) * 100)
                        : (data.acceptance_rate || 95);

                    document.getElementById('statKepuasan').textContent = acceptanceRate + '%';

                } catch (err) {
                    console.error('Error loading statistics:', err);
                    // Show default/fallback values
                    document.getElementById('statTotalPaspor').textContent = '50K+';
                    document.getElementById('statKepuasan').textContent = '98%';
                }
            }
        </script>
    @endpush
@endpush