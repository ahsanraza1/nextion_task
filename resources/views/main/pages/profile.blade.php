@extends('main.dashboard')

@section('page')
    Profile
@endsection
@section('subpanel')
<div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">
<div class="col-lg-8 col-xlg-9 col-md-12">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material" method="POST" action="{{route('update-profile')}}" id="profile_form">
                @csrf
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Name</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="text" placeholder="Name"
                            class="form-control p-0 border-0" value="{{auth()->user()->name}}" name="name"> </div>
                            @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="example-email" class="col-md-12 p-0">Email</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="email" placeholder="Email"
                            class="form-control p-0 border-0" value="{{auth()->user()->email}}"
                            id="example-email" disabled>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Want to change Password?</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="password" name="new_password" placeholder="Enter new password" class="form-control p-0 border-0">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label class="col-md-12 p-0">Password</label>
                    <div class="col-md-12 border-bottom p-0">
                        <input type="password" placeholder="To update profile info you have to provide your current password" name="old_password" class="form-control p-0 border-0">
                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                    </div>
                </div>
                
                
                <div class="form-group mb-4">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" value="Update Profile">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection