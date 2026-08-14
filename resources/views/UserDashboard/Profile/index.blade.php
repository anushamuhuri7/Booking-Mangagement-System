@extends('UserDashboard.Layout.userBaseView')
@section('dashContent')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Profile Details</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('user.profile.save') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label class="col-form-label">Full Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label class="col-form-label">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" value="{{ $data->email }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label class="col-form-label">Phone Number</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone_no" value="{{ $data->phone_no }}" required>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-3">Update Password <small class="text-muted">(Leave blank if no change)</small></h6>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label class="col-form-label">New Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <label class="col-form-label">Confirm Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary px-4">Save Profile Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection