@extends('frontend.layout')

@section('title', 'Car Inquiry Form')


<style>
    :root {
        --cd-red: #e0191d;
        /* CarsDekho red */
    }

    body {
        background: #f6f8fb;
    }

    .inquiry-wrapper {
        padding: 20px 0 40px;
    }

    .hero {
        background: linear-gradient(135deg, #e0191d 0%, #c9161a 45%, #8f0f12 100%);
        color: white;
        border-radius: 18px;
        padding: 28px 24px;
        position: relative;
        overflow: hidden;
    }

    .hero:after {
        content: '';
        position: absolute;
        top: -120px;
        right: -120px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.10);
    }

    .hero:before {
        content: '';
        position: absolute;
        bottom: -140px;
        left: -140px;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }


    .form-card {
        border: none;
        border-radius: 18px;
        box-shadow: 0 10px 25px rgba(18, 38, 63, .08);
    }

    .section-title {
        font-size: 14px;
        letter-spacing: .4px;
        color: #6c757d;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .car-option {
        border: 1px solid #e8edf5;
        background: #fff;
        border-radius: 14px;
        padding: 14px 14px;
        cursor: pointer;
        transition: .2s ease-in-out;
        height: 100%;
        user-select: none;
        position: relative;
    }

    .car-option:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    .car-option input {
        display: none;
    }

    .car-option.active {
        border: 1px solid rgba(224, 25, 29, .55);
        background: rgba(224, 25, 29, .07);
        box-shadow: 0 12px 25px rgba(224, 25, 29, .08);
    }

    .car-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(13, 110, 253, .10);
        font-size: 20px;
        color: #0d6efd;
        transition: .2s ease-in-out;
    }

    .car-option.active .car-icon {
        background: rgba(224, 25, 29, .12);
        color: var(--cd-red);
    }

    /* ✅ check badge top-right */
    .car-check {
        position: absolute;
        top: 10px;
        right: 12px;
        width: 26px;
        height: 26px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(224, 25, 29, .10);
        color: var(--cd-red);
        opacity: 0;
        transform: scale(.9);
        transition: .2s ease-in-out;
    }

    .car-option.active .car-check {
        opacity: 1;
        transform: scale(1);
    }

    .small-help {
        font-size: 12px;
        color: #6c757d;
    }

    .btn-submit {
        border-radius: 14px;
        padding: 12px 16px;
        font-weight: 700;
        background: var(--cd-red) !important;
        border-color: var(--cd-red) !important;
    }

    .btn-submit:hover {
        background: #c9161a !important;
        border-color: #c9161a !important;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        padding: 11px 12px;
        border: 1px solid #e8edf5;
    }

    .form-control:focus {
        border-color: rgba(224, 25, 29, .35);
        box-shadow: 0 0 0 .25rem rgba(224, 25, 29, .12);
    }
</style>



@section('content')
    <div class="inquiry-wrapper">
        <div class="container py-4 py-md-4">

            <!-- HERO -->
            <div class="hero mb-4">
                <div class="row align-items-center">
                    <div class="col-lg-8 position-relative" style="z-index:1;">
                        <h2 class="fw-bold mb-1">Car Inquiry Form</h2>
                        <p class="mb-0 text-white-50">
                            Tell us what car type you're looking for — our team will contact you shortly.
                        </p>
                    </div>
                    <div class="col-lg-4 mt-3 mt-lg-0 text-lg-end position-relative" style="z-index:1;">
                        <span class="badge bg-light text-primary fw-semibold px-3 py-2 rounded-pill">
                            Trusted Car Assistance
                        </span>
                    </div>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- LEFT INFO -->
                <div class="col-lg-4">
                    <div class="card form-card p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="car-icon"><i class="bi bi-shield-check"></i></div>
                            <div>
                                <h5 class="fw-bold mb-0">Secure Inquiry</h5>
                                <div class="small-help">Your information is safe with us.</div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="car-icon"><i class="bi bi-telephone"></i></div>
                            <div>
                                <div class="fw-semibold">Quick Callback</div>
                                <div class="small-help">Get response within 24 hours.</div>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="car-icon"><i class="bi bi-car-front"></i></div>
                            <div>
                                <div class="fw-semibold">Best Options</div>
                                <div class="small-help">We suggest most suitable models.</div>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="car-icon"><i class="bi bi-currency-rupee"></i></div>
                            <div>
                                <div class="fw-semibold">Budget Friendly</div>
                                <div class="small-help">Get best deals & offers.</div>
                            </div>
                        </div>

                        <hr>

                        <div class="small-help">
                            <i class="bi bi-info-circle"></i>
                            Note: Please fill correct details so we can reach you.
                        </div>
                    </div>
                </div>

                <!-- FORM -->
                <div class="col-lg-8">
                    <div class="card form-card">
                        <div class="card-body p-4 p-md-5">

                            <div class="mb-4">
                                <div class="section-title">Customer Details</div>
                                <h4 class="fw-bold mb-0">Submit Your Inquiry</h4>
                                <div class="text-muted">Fill the form and select car types you are interested in.</div>
                            </div>

                            <form method="POST" action="{{ route('car.inquiry.store') }}">
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-0"><i
                                                    class="bi bi-person"></i></span>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter your name">
                                        </div>
                                        @error('name')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-0"><i
                                                    class="bi bi-telephone"></i></span>
                                            <input type="text" name="phone" value="{{ old('phone') }}" maxlength="10"
                                                inputmode="numeric"
                                                oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter 10-digit number">
                                        </div>
                                        @error('phone')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email ID</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-0"><i
                                                    class="bi bi-envelope"></i></span>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="example@gmail.com">
                                        </div>
                                        @error('email')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Address</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-0"><i
                                                    class="bi bi-geo-alt"></i></span>
                                            <input type="text" name="address" value="{{ old('address') }}"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="City, Area">
                                        </div>
                                        @error('address')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="mb-2">
                                    <div class="section-title">Car Options</div>
                                    <div class="fw-bold mb-2">Select Car Type</div>

                                    <div class="row g-3">
                                        @php
                                            $options = [
                                                ['name' => 'Hatchback', 'icon' => 'bi-car-front'],
                                                ['name' => 'Sedan', 'icon' => 'bi-car-front-fill'],
                                                ['name' => 'SUV', 'icon' => 'bi-truck-front'],
                                            ];
                                        @endphp

                                        @foreach ($options as $opt)
                                            <div class="col-md-4">
                                                <label
                                                    class="car-option w-100
            {{ is_array(old('car_options')) && in_array($opt['name'], old('car_options')) ? 'active' : '' }}"
                                                    for="car_{{ $loop->index }}">

                                                    <input type="checkbox" id="car_{{ $loop->index }}"
                                                        name="car_options[]" value="{{ $opt['name'] }}"
                                                        {{ is_array(old('car_options')) && in_array($opt['name'], old('car_options')) ? 'checked' : '' }}>

                                                    <!-- ✅ check icon -->
                                                    <div class="car-check">
                                                        <i class="bi bi-check-lg"></i>
                                                    </div>

                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="car-icon">
                                                            <i class="bi {{ $opt['icon'] }}"></i>
                                                        </div>

                                                        <div>
                                                            <div class="fw-semibold">{{ $opt['name'] }}</div>
                                                            <div class="small-help">Tap to select</div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>

                                    @error('car_options')
                                        <div class="text-danger small mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- ✅ Button now red -->
                                <button type="submit" class="btn btn-primary w-100 btn-submit mt-4">
                                    <i class="bi bi-send"></i> Submit Inquiry
                                </button>

                                <div class="text-center small-help mt-3">
                                    By submitting, you agree to be contacted by our team.
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // On load: apply active class if checkbox already checked (old values)
            document.querySelectorAll('.car-option').forEach((tile) => {
                let checkbox = tile.querySelector('input[type="checkbox"]');
                if (checkbox && checkbox.checked) {
                    tile.classList.add('active');
                }
            });

            // Clicking on tile toggles checkbox
            document.querySelectorAll('.car-option').forEach((tile) => {
                tile.addEventListener('click', function(e) {
                    // allow default label behavior but ensure active class updates
                    let checkbox = tile.querySelector('input[type="checkbox"]');
                    if (!checkbox) return;

                    // Toggle state
                    checkbox.checked = !checkbox.checked;

                    // Toggle class
                    tile.classList.toggle('active', checkbox.checked);
                });
            });

        });
    </script>


    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Inquiry Submitted!',
                    text: "{{ session('success') }}",
                    confirmButtonText: 'OK',
                    timer: 2500,
                    timerProgressBar: true
                });
            });
        </script>
    @endif
@endpush
