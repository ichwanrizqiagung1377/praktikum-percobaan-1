@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 mt-4 mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('cv.profile') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Portofolio Detail</li>
            </ol>
        </nav>

        <div class="card shadow-sm border-0">
            <img src="{{ $data['image'] }}" class="card-img-top" alt="{{ $data['title'] }}" style="max-height: 400px; object-fit: cover;">
            <div class="card-body p-4">
                <h1 class="card-title fw-bold text-primary">{{ $data['title'] }}</h1>
                <p class="card-text text-muted fs-5 mt-3">{{ $data['description'] }}</p>
                
                <div class="mt-4">
                    <h5 class="fw-semibold">Teknologi yang Digunakan:</h5>
                    <div class="d-flex flex-wrap gap-2 mt-2">
                        @foreach($data['technologies'] as $tech)
                            <span class="badge bg-secondary px-3 py-2 fs-6">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <a href="{{ route('cv.profile') }}" class="btn btn-outline-primary px-4 py-2">Kembali ke Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
