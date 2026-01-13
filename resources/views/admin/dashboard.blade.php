@extends('admin.layout')

@section('title','Dashboard')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold mb-1">Dashboard</h3>
    <p class="text-muted mb-0">Overview of your website content.</p>
</div>

<div class="row g-3">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="label">Total Banners</div>
                    <div class="value">{{ $banners }}</div>
                </div>
                <div class="icon"><i class="bi bi-images"></i></div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="label">Total Cars</div>
                    <div class="value">{{ $cars }}</div>
                </div>
                <div class="icon"><i class="bi bi-car-front"></i></div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="label">Most Searched</div>
                    <div class="value">{{ $mostSearched }}</div>
                </div>
                <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="label">Latest Cars</div>
                    <div class="value">{{ $latest }}</div>
                </div>
                <div class="icon"><i class="bi bi-clock-history"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="card card-soft mt-4">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-1">Quick Actions</h5>
        <p class="text-muted mb-3">Manage your website sections quickly.</p>

        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.settings.edit') }}" class="btn btn-soft-primary">
                <i class="bi bi-gear"></i> Site Settings
            </a>
            <a href="{{ route('banners.index') }}" class="btn btn-soft-primary">
                <i class="bi bi-images"></i> Manage Banners
            </a>
            <a href="{{ route('cars.index') }}" class="btn btn-soft-primary">
                <i class="bi bi-car-front"></i> Manage Cars
            </a>
        </div>
    </div>
</div>
@endsection
