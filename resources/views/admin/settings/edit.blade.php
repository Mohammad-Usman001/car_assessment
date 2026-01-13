@extends('admin.layout')

@section('title','Site Settings')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Site Settings</h3>
        <p class="text-muted mb-0">Manage website header & footer information.</p>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-soft-primary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">

        <!-- Left Column -->
        <div class="col-lg-4">
            <div class="card card-soft">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">Branding</h5>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Site Name <span class="text-danger">*</span></label>
                        <input type="text"
                               name="site_name"
                               value="{{ old('site_name', $setting->site_name) }}"
                               class="form-control @error('site_name') is-invalid @enderror"
                               placeholder="CarsDekho Clone">
                        @error('site_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Logo (optional)</label>
                        <input type="file"
                               name="logo"
                               accept="image/*"
                               onchange="previewLogo(event)"
                               class="form-control @error('logo') is-invalid @enderror">
                        <div class="small text-muted mt-1">Recommended: PNG / WebP transparent</div>
                        @error('logo') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="border rounded-4 p-3 bg-light">
                        <div class="fw-semibold mb-2">Logo Preview</div>
                        <img id="logoPreview"
                             src="{{ $setting->logo ? asset('storage/'.$setting->logo) : 'https://via.placeholder.com/220x90?text=Logo+Preview' }}"
                             class="img-fluid rounded-4 border"
                             style="max-height:110px; object-fit:contain; background:#fff; padding:10px;">
                    </div>

                    <hr class="my-4">

                    <div class="small text-muted">
                        <i class="bi bi-info-circle"></i>
                        Branding values will appear in website header & footer.
                    </div>

                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-8">

            <!-- Header Settings -->
            <div class="card card-soft mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-layout-text-sidebar-reverse"></i> Header Settings
                    </h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Header Phone</label>
                            <input type="text"
                                   name="header_phone"
                                   value="{{ old('header_phone', $setting->header_phone) }}"
                                   class="form-control @error('header_phone') is-invalid @enderror"
                                   placeholder="Example: +91 98765 43210">
                            @error('header_phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Header Email</label>
                            <input type="email"
                                   name="header_email"
                                   value="{{ old('header_email', $setting->header_email) }}"
                                   class="form-control @error('header_email') is-invalid @enderror"
                                   placeholder="example@gmail.com">
                            @error('header_email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Settings -->
            <div class="card card-soft">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-layout-text-window-reverse"></i> Footer Settings
                    </h5>

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Footer About</label>
                            <textarea name="footer_about"
                                      rows="4"
                                      class="form-control @error('footer_about') is-invalid @enderror"
                                      placeholder="Write short about your company...">{{ old('footer_about', $setting->footer_about) }}</textarea>
                            @error('footer_about') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            <div class="small text-muted mt-1">Max 800 characters recommended.</div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Footer Address</label>
                            <input type="text"
                                   name="footer_address"
                                   value="{{ old('footer_address', $setting->footer_address) }}"
                                   class="form-control @error('footer_address') is-invalid @enderror"
                                   placeholder="Example: Lucknow, Uttar Pradesh, India">
                            @error('footer_address') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Footer Phone</label>
                            <input type="text"
                                   name="footer_phone"
                                   value="{{ old('footer_phone', $setting->footer_phone) }}"
                                   class="form-control @error('footer_phone') is-invalid @enderror"
                                   placeholder="Example: +91 98765 43210">
                            @error('footer_phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Footer Email</label>
                            <input type="email"
                                   name="footer_email"
                                   value="{{ old('footer_email', $setting->footer_email) }}"
                                   class="form-control @error('footer_email') is-invalid @enderror"
                                   placeholder="support@domain.com">
                            @error('footer_email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary rounded-4 px-4">
                            <i class="bi bi-save"></i> Save Settings
                        </button>

                        <a href="{{ route('admin.settings.edit') }}" class="btn btn-outline-secondary rounded-4 px-4">
                            Reset
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</form>
@endsection

@push('scripts')
<script>
function previewLogo(event){
    const [file] = event.target.files;
    if(file){
        document.getElementById('logoPreview').src = URL.createObjectURL(file);
    }
}
</script>
@endpush
