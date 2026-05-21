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

                                <form action="{{ route('admin.approved.delete', $student->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm w-100">

                                        Delete

                                    </button>

                                </form>

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

@endsection