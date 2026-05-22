@extends('layouts.master')

@section('content')

<div class="container py-5">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header bg-success text-white p-4">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="fw-bold mb-0">

                    Approved Applicants

                </h2>

                <span class="badge bg-light text-success fs-6 px-3 py-2">

                    {{ $approved->count() }} Approved

                </span>

            </div>

        </div>

        <div class="card-body">

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    @endif

    <div class="d-flex justify-content-end mb-3">

        <a href="{{ route('admin.approved.export') }}"
           class="btn btn-success rounded-3 shadow-sm">

            <i class="fa-solid fa-file-excel me-2"></i>

            Download Excel

        </a>

    </div>

    <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>FULL NAME</th>

                            <th>COURSE</th>

                            <th>SCHOOL</th>

                            <th>CONTACT</th>

                            <th>STATUS</th>

                            <th width="120">ACTION</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($approved as $student)

                        <tr>

                            <td>

                                {{ $student->id }}

                            </td>

                            <td class="fw-bold text-uppercase">

                                {{ $student->first_name }}
                                {{ $student->middle_name }}
                                {{ $student->last_name }}

                            </td>

                            <td class="text-uppercase">

                                {{ $student->college_course }}

                            </td>

                            <td class="text-uppercase">

                                {{ $student->college_school }}

                            </td>

                            <td>

                                {{ $student->contact_number }}

                            </td>

                            <td>

                                <span class="badge bg-success px-3 py-2">

                                    APPROVED

                                </span>

                            </td>

                            <td>

                                <button type="button"
        class="btn btn-danger btn-sm w-100"
        onclick="openDeleteModal({{ $student->id }})">

    <i class="fa-solid fa-trash me-1"></i>

    Delete

</button>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5 text-muted">

                                No approved applicants yet.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- DELETE MODAL -->

<div class="modal fade"
     id="deleteModal"
     tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 rounded-4 shadow-lg">

            <div class="modal-body text-center p-5">

                <div class="mb-4">

                    <div class="delete-icon mx-auto">

                        <i class="fa-solid fa-trash"></i>

                    </div>

                </div>

                <h3 class="fw-bold mb-3 text-danger">

                    Delete Approved Applicant?

                </h3>

                <p class="text-muted mb-4">

                    Are you sure you want to remove this approved applicant?
                    This action cannot be undone.

                </p>

                <form id="deleteForm"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <div class="d-flex justify-content-center gap-3">

                        <button type="button"
                                class="btn btn-light px-4 rounded-3"
                                data-bs-dismiss="modal">

                            Cancel

                        </button>

                        <button type="submit"
                                class="btn btn-danger px-4 rounded-3">

                            <i class="fa-solid fa-trash me-1"></i>

                            Yes Delete

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
<style>

.delete-icon{
    width:90px;
    height:90px;

    border-radius:50%;

    background:rgba(239,68,68,.12);

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:38px;
    color:#ef4444;

    animation:pulseDelete 1.5s infinite;
}

@keyframes pulseDelete{

    0%{
        transform:scale(1);
    }

    50%{
        transform:scale(1.08);
    }

    100%{
        transform:scale(1);
    }

}

</style>
<script>

function openDeleteModal(id){

    const form = document.getElementById('deleteForm');

    form.action = "{{ url('/admin/approved-applicants') }}/" + id;

    const modal = new bootstrap.Modal(
        document.getElementById('deleteModal')
    );

    modal.show();

}

</script>
@endsection