@extends('main.dashboard')

@section('page')
    Docs
@endsection
@section('subpanel')
<div class="container d-flex flex-column mt-3 justify-content-center align-items-center">
<div class="col-lg-8 col-xlg-9 col-md-12 mb-5">
    <p>
        <h2>Project Documentation</h2>
        <p>
            <ul>
                <li>
                    <h5>
                        Authentication
                    </h5>
                    <ul>
                        <li>
                            <p>
                                This project is using no external packages for authentication.
                            </p>
                        </li>
                        <li>
                            <h5>
                            Registeration
                            </h5>
                            <ul>
                                <li>
                                    End user can register by providing Name, Email and Password.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h5>
                            Email verification
                            </h5>
                            <ul>
                                <li>
                                    After registration user will get an email for verification. By clicking on provided link system will lead the request to a route named "verification.verifyEmail". After extracting token from request and matching it with user's token ( generated and saved in DB while registering user ) user will be loggedin and can proceed to dashboard.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h5>
                            Login
                            </h5>
                            <ul>
                                <li>
                                    User have to provide valid email and password for login.
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <h5>
                        Dashboard
                    </h5>
                    <ul>
                        <li>
                            <p>
                                User will be shown a styled dashboard.
                            </p>
                        </li>

                        <li>
                            <ul>
                                <h5>Top Navbar</h5>
                                <ul>
                                    <li>
                                        It has a logout button and User name
                                    </li>
                                </ul>
                            </ul>
                        </li>

                        <li>
                            <h5>
                            Side Bar
                            </h5>
                            <ul>
                                <li>
                                    Side bar ( collapseable ) has 3 links ( icons when closed ).
                                </li>
                                <li>
                                    <ul>
                                        <h5>Profile</h5>
                                        <ul>
                                            <li>
                                                Profile is the default section displayed in dashboard. 
                                            </li>
                                            <li>
                                                Form displays current user iformation ( Name and Email ) 
                                            </li>
                                            <li>
                                                It has a new password field for changing password. 
                                            </li>
                                            <li>
                                                User has to provide his password for updating profile information.
                                            </li>
                                        </ul>
                                    </ul>
                                </li>
                                
                                <li>
                                    <ul>
                                        <h5>Flight Data</h5>
                                        <ul>
                                            <li>
                                                In this project a third party API, Flight Data Api is integrated.
                                            </li>
                                            <li>
                                                This section will display : 
                                                <ul>
                                                    <li>
                                                        Number of flights scheduled today.
                                                    </li>
                                                    <li>
                                                        Number of scheduled flights given by API
                                                    </li>
                                                    <li>
                                                        Other numbers of flights based on their status. (Active flights, Landed flights, Diverted flights, Incident flights, Cancelled flights)
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </ul>
                                </li>

                                <li>
                                    <ul>
                                        <h5>Docs</h5>
                                        <ul>
                                            <li>
                                                This section is a little Documentation about this project.
                                            </li>
                                        </ul>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <h5>
                        Checks
                    </h5>
                    <ul>
                        <li>
                            Site is responsive.
                        </li>
                        <li>
                            Errors in forms are shown under respective fields
                        </li>
                    </ul>
                </li>
            </ul>
        </p>
    </p>
    {{-- <div class="card border">
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
    </div> --}}
</div>
</div>
@endsection