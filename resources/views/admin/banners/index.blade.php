@extends('admin.layout')

@section('title', 'Manage Banners')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="fw-bold mb-1">Banners</h3>
            <p class="text-muted mb-0">Add / update banner section of homepage.</p>
        </div>

        <a href="{{ route('banners.create') }}" class="btn btn-primary rounded-4 px-4">
            <i class="bi bi-plus-circle"></i> Add Banner
        </a>
    </div>

    <div class="card card-soft">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Banner</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($banners as $index => $banner)
                            <tr>
                                <td class="ps-4">
                                    {{ $banners->firstItem() + $index }}
                                </td>

                                <td style="width:140px;">
                                    <img src="{{ asset('storage/' . $banner->image) }}" class="rounded-4 border"
                                        style="width:120px;height:70px;object-fit:cover;" alt="Banner">
                                </td>

                                <td>
                                    <div class="fw-semibold">{{ $banner->title ?? '—' }}</div>
                                    <div class="text-muted small">{{ $banner->subtitle ?? '' }}</div>
                                </td>

                                <td>
                                    @if ($banner->status)
                                        <span class="badge bg-success rounded-pill px-3">Active</span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill px-3">Inactive</span>
                                    @endif
                                </td>

                                <td class="text-end pe-4">
                                    <a href="{{ route('banners.edit', $banner->id) }}"
                                        class="btn btn-sm btn-outline-primary rounded-4">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
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
                                <td colspan="5" class="text-center py-5 text-muted">
                                    No banners found. Please add your first banner.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-3">
                {{ $banners->links() }}
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
                text: "This banner will be deleted permanently!",
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
