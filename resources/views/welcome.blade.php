@extends('layouts.app')

@section('content')

<style>
    /* Global Styles */
    body {
        background-color: #f8f9fa; /* clean light gray modern */
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }
    .fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        color: white;
        padding: 80px 0;
        border-radius: 0 0 30px 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-top: -1.5rem; /* Menyesuaikan jika ada margin dari navbar */
    }
    
    /* Typing Effect */
    .typing-text::after {
        content: '|';
        animation: blink 1s step-end infinite;
    }
    @keyframes blink {
        50% { opacity: 0; }
    }

    /* Cards */
    .portfolio-card {
        background: #fff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .portfolio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    /* Buttons */
    .btn-modern {
        border-radius: 50rem;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
    }
    .btn-modern:hover {
        transform: scale(1.05);
        filter: brightness(1.1);
    }

    /* Profile Photo */
    .profile-photo-container {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid #fff;
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        margin: -75px auto 20px;
        background: #fff;
        transition: all 0.3s ease;
    }
    .profile-photo-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease;
    }
    .profile-photo-container:hover img {
        transform: scale(1.1);
    }

    /* Custom Badges */
    .badge-skill {
        padding: 8px 16px;
        font-size: 0.85rem;
        border-radius: 50rem;
        font-weight: 500;
        margin-right: 5px;
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }
    .badge-skill:hover {
        transform: translateY(-3px);
    }
</style>

@if(session('success'))
<div class="container mt-3 fade-in">
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if($profile)
<!-- HERO SECTION -->
<div class="hero-section text-center fade-in">
    <div class="container">
        <!-- Ambil nama depan saja untuk disapa jika nama terlalu panjang -->
        <h1 class="display-4 fw-bold mb-3">Hi, I'm <span class="text-info">{{ explode(' ', trim($profile->nama))[0] }}</span></h1>
        <h3 class="h4 fw-light mb-4 text-white-50 typing-text">Laravel Developer | Web Programmer | Backend Engineer</h3>
        
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="/profile/edit" class="btn btn-light text-primary btn-modern shadow-sm">
                Edit Profil
            </a>
            <button class="btn btn-outline-light btn-modern" onclick="alert('Ini adalah tombol dummy untuk mengunduh CV.')">
                Download CV
            </button>
        </div>
    </div>
</div>

<div class="container mb-5 fade-in" style="margin-top: 80px;">
    <div class="row justify-content-center">
        <!-- MAIN PROFILE COLUMN -->
        <div class="col-lg-4 col-md-5 mb-4 mt-md-0 mt-5">
            <div class="portfolio-card text-center pb-4 px-3 h-100 mt-5 mt-md-0">
                <div class="profile-photo-container">
                    @if($profile->foto)
                        <img src="{{ asset('storage/' . $profile->foto) }}" alt="Foto Profil">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($profile->nama) }}&background=random&size=150" alt="Foto Profil">
                    @endif
                </div>
                
                <h2 class="h3 fw-bold text-dark mb-1">{{ $profile->nama }}</h2>
                
                <p class="text-muted mb-3 d-flex justify-content-center align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                      <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                    </svg>
                    {{ $profile->nim }}
                </p>
                
                <p class="text-secondary small mb-4 px-2">{{ $profile->bio }}</p>
                
                <a href="{{ route('portofolio.show', 'web-design') }}" class="btn btn-primary btn-modern w-100 shadow-sm">
                    Lihat Portofolio Project
                </a>
            </div>
        </div>

        <!-- DETAILS COLUMN -->
        <div class="col-lg-8 col-md-7">
            <!-- ABOUT ME -->
            <div class="portfolio-card p-4 mb-4">
                <h4 class="fw-bold mb-3 border-bottom pb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-lines-fill me-2 text-primary" viewBox="0 0 16 16">
                      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                    </svg>
                    About Me
                </h4>
                <p class="text-muted" style="line-height: 1.8;">
                    {{ $profile->bio ?? 'Saya adalah seorang developer yang antusias dalam menciptakan solusi inovatif dan mendesain antarmuka yang ramah pengguna. Memiliki ketertarikan kuat dalam teknologi backend dan frontend modern.' }}
                </p>
            </div>

            <!-- PERSONAL INFO GRID -->
            <div class="portfolio-card p-4 mb-4">
                <h4 class="fw-bold mb-4 border-bottom pb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill me-2 text-primary" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </svg>
                    Personal Information
                </h4>
                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="d-block text-muted small fw-bold mb-1">NAMA LENGKAP</span>
                            <span class="fw-semibold text-dark">{{ $profile->nama }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="d-block text-muted small fw-bold mb-1">NIM</span>
                            <span class="fw-semibold text-dark">{{ $profile->nim }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="d-block text-muted small fw-bold mb-1">EMAIL</span>
                            <span class="fw-semibold text-dark">{{ $profile->email }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 bg-light rounded-3 h-100 border">
                            <span class="d-block text-muted small fw-bold mb-1">ALAMAT</span>
                            <span class="fw-semibold text-dark">{{ $profile->alamat }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SKILLS SECTION (DUMMY) -->
            <div class="portfolio-card p-4">
                <h4 class="fw-bold mb-4 border-bottom pb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-code-square me-2 text-primary" viewBox="0 0 16 16">
                      <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                      <path d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"/>
                    </svg>
                    Technical Skills
                </h4>
                <div class="d-flex flex-wrap">
                    <span class="badge bg-danger badge-skill">Laravel 12</span>
                    <span class="badge bg-primary badge-skill">PHP 8</span>
                    <span class="badge bg-info text-dark badge-skill">MySQL</span>
                    <span class="badge bg-secondary badge-skill">Bootstrap 5</span>
                    <span class="badge bg-warning text-dark badge-skill">JavaScript</span>
                    <span class="badge bg-dark badge-skill">Git & GitHub</span>
                    <span class="badge bg-success badge-skill">RESTful API</span>
                </div>
            </div>

        </div>
    </div>
</div>
@else
<div class="row justify-content-center mt-5 fade-in">
    <div class="col-md-8 text-center mt-5">
        <div class="alert alert-warning shadow-sm portfolio-card p-4">
            <h4 class="fw-bold mb-3">Oops!</h4>
            <p>Data Profil Tidak Ditemukan. Silakan tambahkan data melalui fitur Edit Profil.</p>
        </div>
    </div>
</div>
@endif

@endsection