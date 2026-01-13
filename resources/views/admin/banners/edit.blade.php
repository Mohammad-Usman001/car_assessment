@extends('admin.layout')

@section('title','Edit Banner')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Banner</h3>
        <p class="text-muted mb-0">Update banner data and image.</p>
    </div>

    <a href="{{ route('banners.index') }}" class="btn btn-soft-primary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card card-soft">
    <div class="card-body p-4 p-md-5">

        <form method="POST" action="{{ route('banners.update',$banner->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title',$banner->title) }}"
                           class="form-control @error('title') is-invalid @enderror">
                    @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Subtitle</label>
                    <input type="text"
                           name="subtitle"
                           value="{{ old('subtitle',$banner->subtitle) }}"
                           class="form-control @error('subtitle') is-invalid @enderror">
                    @error('subtitle') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Replace Image (optional)</label>
                    <input type="file"
                           name="image"
                           class="form-control @error('image') is-invalid @enderror"
                           accept="image/*"
                           onchange="previewImage(event)">
                    @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">Status</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" value="1"
                               {{ $banner->status ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="border rounded-4 p-3 bg-light">
                        <div class="fw-semibold mb-2">Preview</div>

                        <img id="preview"
                             src="{{ asset('storage/'.$banner->image) }}"
                             class="img-fluid rounded-4 border"
                             style="max-height:260px; object-fit:cover;">
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-primary rounded-4 px-4">
                    <i class="bi bi-arrow-repeat"></i> Update Banner
                </button>

                <a href="{{ route('banners.index') }}" class="btn btn-outline-secondary rounded-4 px-4">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event){
        const [file] = event.target.files;
        if(file){
            document.getElementById('preview').src = URL.createObjectURL(file);
        }
    }
</script>
@endpush
