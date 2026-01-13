@php
    $logo = $setting?->logo ? asset('storage/'.$setting->logo) : null;
@endphp

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container py-2">

        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('home') }}">
            @if($logo)
                <img src="{{ $logo }}" class="brand-img" alt="logo">
            @else
                <div class="brand-logo">CD</div>
            @endif
            {{-- <span>{{ $setting?->site_name ?? 'CarsDekho Clone' }}</span> --}}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            <ul class="navbar-nav mx-lg-auto gap-lg-2 mt-3 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">New Cars</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Used Cars</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Compare</a></li>
                <li class="nav-item"><a class="nav-link" href="#">News</a></li>
            </ul>

            <div class="d-flex align-items-center gap-2 mt-3 mt-lg-0">
                @if($setting?->header_phone)
                    <div class="nav-pill d-none d-lg-flex">
                        <i class="bi bi-telephone me-1"></i> {{ $setting->header_phone }}
                    </div>
                @endif

                @if($setting?->header_email)
                    <div class="nav-pill d-none d-lg-flex">
                        <i class="bi bi-envelope me-1"></i> {{ $setting->header_email }}
                    </div>
                @endif

                <a class="btn btn-primary d-flex align-items-center gap-2" href="{{ route('car.inquiry.create') }}">
                    <i class="bi bi-send"></i> Inquiry
                </a>
            </div>
        </div>
    </div>
</nav>
