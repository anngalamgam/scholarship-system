@extends('layouts.master')
@section('content')
<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>
            <i class="fa-solid fa-layer-group"></i> User List
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addUserModal">
              <i class="fas fa-plus"></i> Add User
            </button>
          </h4>
        </div>
        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('message'))
                        <div class="alert alert-danger">
                            {{Session::get('message')}}
                        </div>
                    @endif
        <div class="card-body">
          <table id="datatablesSimple" class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $pic)
              <tr>
                <td>{{ $pic->name }}</td>
                <td>{{ $pic->email }}</td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('user.store') }}">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Full Name</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full Name" value="{{ old('name') }}">
                  @error('name')
                  <span class="text-danger"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email Address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                  @error('email')
                  <span class="text-danger"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
             
              <div class="col-md-12 mt-4">
                <div class="form-group">
                  <label>User Type</label>
                  <select class="form-control @error('role_as') is-invalid @enderror" name="role_as">
                    <option value="" disabled selected>Select User Type</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Department Admin</option>
                  </select>
                  @error('role_as')
                  <span class="text-danger"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <label>Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********">
                  @error('password')
                  <span class="text-danger"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="********">
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary w-100">Register</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection