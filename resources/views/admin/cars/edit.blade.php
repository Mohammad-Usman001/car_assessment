@extends('admin.layout')

@section('title','Edit Car')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Edit Car</h3>
        <p class="text-muted mb-0">Update car details and image.</p>
    </div>

    <a href="{{ route('cars.index') }}" class="btn btn-soft-primary">
        <i class="bi bi-arrow-left"></i> Back
    </a>
</div>

<div class="card card-soft">
    <div class="card-body p-4 p-md-5">

        <form method="POST" action="{{ route('cars.update',$car->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Car Name <span class="text-danger">*</span></label>
                    <input type="text" name="name"
                           value="{{ old('name',$car->name) }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Brand</label>
                    <input type="text" name="brand"
                           value="{{ old('brand',$car->brand) }}"
                           class="form-control @error('brand') is-invalid @enderror">
                    @error('brand') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Price (₹)</label>
                    <input type="number" name="price"
                           value="{{ old('price',$car->price) }}"
                           class="form-control @error('price') is-invalid @enderror">
                    @error('price') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Car Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-select @error('type') is-invalid @enderror">
                        <option value="">Select type</option>
                        <option value="most_searched" {{ old('type',$car->type)=='most_searched' ? 'selected' : '' }}>Most Searched</option>
                        <option value="latest" {{ old('type',$car->type)=='latest' ? 'selected' : '' }}>Latest</option>
                    </select>
                    @error('type') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
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
                               {{ $car->status ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="border rounded-4 p-3 bg-light">
                        <div class="fw-semibold mb-2">Image Preview</div>
                        <img id="preview"
                             src="{{ $car->image ? asset('storage/'.$car->image) : 'https://via.placeholder.com/600x400?text=No+Image' }}"
                             class="img-fluid rounded-4 border"
                             style="max-height:260px; object-fit:cover;">
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button class="btn btn-primary rounded-4 px-4">
                    <i class="bi bi-arrow-repeat"></i> Update Car
                </button>

                <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary rounded-4 px-4">
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
