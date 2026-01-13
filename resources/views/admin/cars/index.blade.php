@extends('admin.layout')

@section('title','Manage Cars')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h3 class="fw-bold mb-1">Cars</h3>
        <p class="text-muted mb-0">Manage homepage car sections (Most searched / Latest).</p>
    </div>

    <a href="{{ route('cars.create') }}" class="btn btn-primary rounded-4 px-4">
        <i class="bi bi-plus-circle"></i> Add Car
    </a>
</div>

<!-- Filter -->
<div class="card card-soft mb-3">
    <div class="card-body p-3">
        <form method="GET" action="{{ route('cars.index') }}" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold mb-1">Filter by Type</label>
                <select name="type" class="form-select">
                    <option value="">All Cars</option>
                    <option value="most_searched" {{ request('type') == 'most_searched' ? 'selected' : '' }}>
                        Most Searched
                    </option>
                    <option value="latest" {{ request('type') == 'latest' ? 'selected' : '' }}>
                        Latest
                    </option>
                </select>
            </div>

            <div class="col-md-3">
                <button class="btn btn-soft-primary w-100">
                    <i class="bi bi-funnel"></i> Apply Filter
                </button>
            </div>

            <div class="col-md-3">
                <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary rounded-4 w-100">
                    Reset
                </a>
            </div>
        </form>
    </div>
</div>

<div class="card card-soft">
    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Car</th>
                        <th>Details</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($cars as $index => $car)
                    <tr>
                        <td class="ps-4">
                            {{ $cars->firstItem() + $index }}
                        </td>

                        <td style="width:140px;">
                            @if($car->image)
                                <img src="{{ asset('storage/'.$car->image) }}"
                                     class="rounded-4 border"
                                     style="width:120px;height:70px;object-fit:cover;"
                                     alt="Car">
                            @else
                                <div class="text-muted small">No Image</div>
                            @endif
                        </td>

                        <td>
                            <div class="fw-semibold">{{ $car->name }}</div>
                            <div class="text-muted small">
                                Brand: {{ $car->brand ?? '—' }}
                                @if($car->price)
                                    | Price: ₹{{ number_format($car->price, 0) }}
                                @endif
                            </div>
                        </td>

                        <td>
                            @if($car->type == 'most_searched')
                                <span class="badge bg-primary rounded-pill px-3">Most Searched</span>
                            @else
                                <span class="badge bg-info text-dark rounded-pill px-3">Latest</span>
                            @endif
                        </td>

                        <td>
                            @if($car->status)
                                <span class="badge bg-success rounded-pill px-3">Active</span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-3">Inactive</span>
                            @endif
                        </td>

                        <td class="text-end pe-4">
                            <a href="{{ route('cars.edit',$car->id) }}"
                               class="btn btn-sm btn-outline-primary rounded-4">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('cars.destroy',$car->id) }}"
                                  method="POST"
                                  class="d-inline delete-form">
                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-sm btn-outline-danger rounded-4 btn-delete">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            No cars found. Please add your first car.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-3">
            {{ $cars->links() }}
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-delete").forEach((btn) => {
        btn.addEventListener("click", function () {
            let form = this.closest(".delete-form");

            Swal.fire({
                title: "Are you sure?",
                text: "This car will be deleted permanently!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, Delete",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
