@extends('admin.template')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Users table - {{$users->count()}}</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <div class="text-end mx-5" >
                    <a href="{{ route('users.new') }}" class="btn btn-primary">Create User</a>
                </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder"> <i class="fa fa-check"></i> Check</th>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Name</th>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Email</th>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Address / Phone</th>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Photo</th>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Role</th>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Created</th>
                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Actions</th>

                  </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                          <td style="text-align: center;">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{!! $user->hasVerifiedEmail() ? '<i class="fa fa-check fa-2x"></i>' : '<i class="fa fa-minus-circle fa-2x text-danger"></i>'!!}</h6>
                            </div>
                          </td>

                            <td style="text-align: center;">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                </div>
                            </td>

                            <td style="text-align: center;">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->email }}</h6>
                                </div>
                            </td>

                            <td style="text-align: center;">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->address }}</h6><br>
                                    <h6 class="mb-0 text-sm">{{ $user->phone }}</h6>
                                </div>
                            </td>

                            <td style="text-align: center;">
                                {{-- <img src="/images/users/{{ $user->photo }}" alt="{{ $user->name }}" style="width: 90px; height:70px;"> --}}
                                <img src="{{ asset('images/users/'.$user->photo) }}" alt="{{ $user->name }}" style="width: 90px; height:70px;">
                            </td>

                            <td style="text-align: center;">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->role }}</h6>

                                </div>
                            </td>

                            <td style="text-align: center;">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->created_at->format('d-m-Y') }}</h6>
                                </div>
                            </td>

                            <td style="text-align: center;">
                                <a href="{{ route('users.editForm', $user->id) }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty

                        <p class="alert alert-danger">there is no data in the table</p>

                    @endforelse

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

@endsection
