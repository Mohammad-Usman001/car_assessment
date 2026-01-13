@extends('frontend.layout')

@section('title', ($setting?->site_name ?? 'CarsDekho Clone') . ' - Home')

@section('content')
    <div class="hero-banner p-4">

        <!-- ===== Banner Slider ===== -->
        <div class="hero-slider">
            @if ($banners->count())
                <div id="bannerSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($banners as $key => $banner)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }} position-relative">
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner">
                                <div class="hero-overlay"></div>

                                <div class="hero-content">
                                    <div class="badge-soft mb-2">Explore Cars</div>
                                    <h1>{{ $banner->title ?? 'Find your perfect car today' }}</h1>
                                    <p>{{ $banner->subtitle ?? 'Compare prices, models & features in one place.' }}</p>

                                    <div class="d-flex gap-2 flex-wrap">
                                        <a href="#most-searched" class="btn btn-primary">
                                            Most Searched Cars
                                        </a>
                                        <a href="{{ route('car.inquiry.create') }}" class="btn btn-outline-light">
                                            Submit Inquiry
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            @else
                <div class="bg-white border rounded-4 p-5 text-center">
                    <h4 class="fw-bold mb-2">No banners added</h4>
                    <p class="text-muted mb-0">Add banners from Admin Panel → Banners</p>
                </div>
            @endif
        </div>


    </div>    

        <!-- ===== Most Searched Cars ===== -->
        <section class="content-container" id="most-searched">
            <div class="container">
                <div class="home-section">

                    <div class="section-head">
                        <div>
                            <div class="title">The most searched cars</div>
                            <div class="subtitle">Popular cars people are searching right now</div>
                        </div>
                        <a href="#" class="view-all">
                            View All <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <div class="row g-3">
                        @forelse($mostSearchedCars as $car)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="car-card">
                                    <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/600x400?text=Car' }}"
                                        class="car-img" alt="car">

                                    <div class="car-body">
                                        <div class="car-name">{{ $car->name }}</div>
                                        <div class="car-meta">{{ $car->brand ?? 'Brand' }}</div>

                                        <div class="d-flex align-items-center justify-content-between mt-3">
                                            <span class="price-pill">
                                                <i class="bi bi-currency-rupee"></i>
                                                @if ($car->price)
                                                    {{ number_format($car->price, 0) }}
                                                @else
                                                    —
                                                @endif
                                            </span>

                                            <span class="badge-soft">Popular</span>
                                        </div>

                                        <a href="{{ route('car.inquiry.create') }}" class="btn btn-primary w-100 mt-3">
                                            Get Best Offer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="bg-white border rounded-4 p-4 text-center text-muted">
                                    No most searched cars added yet.
                                </div>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>    
        </section>


        <!-- ===== Latest Cars ===== -->
        <section class="content-container pt-0">
            <div class="container">
            <div class="home-section">

                <div class="section-head">
                    <div>
                        <div class="title">Latest cars</div>
                        <div class="subtitle">Newly launched cars with fresh updates</div>
                    </div>
                    <a href="#" class="view-all">
                        View All <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="row g-3">
                    @forelse($latestCars as $car)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="car-card">
                                <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/600x400?text=Car' }}"
                                    class="car-img" alt="car">

                                <div class="car-body">
                                    <div class="car-name">{{ $car->name }}</div>
                                    <div class="car-meta">{{ $car->brand ?? 'Brand' }}</div>

                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                        <span class="price-pill">
                                            <i class="bi bi-currency-rupee"></i>
                                            @if ($car->price)
                                                {{ number_format($car->price, 0) }}
                                            @else
                                                —
                                            @endif
                                        </span>

                                        <span class="badge-soft">New</span>
                                    </div>

                                    <a href="{{ route('car.inquiry.create') }}" class="btn btn-primary w-100 mt-3">
                                        Check Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="bg-white border rounded-4 p-4 text-center text-muted">
                                No latest cars added yet.
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
            </div>
        </section>


    
@endsection
