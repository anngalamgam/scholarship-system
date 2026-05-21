@extends('layouts.master')
@section('content')

<div class="container">
    <div class="py-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div class="p-6 text-gray-900">
                <div class="row">
                
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('narrative.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-dark">TOTAL NARRATIVE</h5>
                                </div>
                                <div class="card-body bg-primary d-flex justify-content-between align-items-center">
                                    <p class="card-text display-4 text-dark mb-0"><i class="fa fa-solid fa-book"></i></p>
                                    <p class="card-text display-6 text-dark mb-0 font-weight-bold">{{ $totalNarrative }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                 
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('program.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-dark">TOTAL PROGRAM</h5>
                                </div>
                                <div class="card-body bg-success d-flex justify-content-between align-items-center">
                                    <p class="card-text display-4 text-dark mb-0"><i class="fa-solid fa-bell"></i></p>
                                    <p class="card-text display-6 text-dark mb-0 font-weight-bold">{{ $totalProgram }}</p>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-4 mb-3">
                        <a href="{{ route('user.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-dark">TOTAL USER</h5>
                                </div>
                                <div class="card-body bg-info d-flex justify-content-between align-items-center">
                                    <p class="card-text display-4 text-dark mb-0"><i class="fa-solid fa-people-group"></i></p>
                                    <p class="card-text display-6 text-dark mb-0 font-weight-bold">{{ $totalUsers }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-3">
                        <a href="{{ route('project.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-dark">TOTAL PROJECT</h5>
                                </div>
                                <div class="card-body bg-warning d-flex justify-content-between align-items-center">
                                    <p class="card-text display-4 text-dark mb-0"><i class="fa-solid fa-clipboard-list"></i></p>
                                    <p class="card-text display-6 text-dark mb-0 font-weight-bold">{{ $totalProject }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






 @endsection
 