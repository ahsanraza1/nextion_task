@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center d-flex flex-column align-items-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">OOPS !</div>

                    <div class="card-body">
                        <label class="col-md-4 col-form-label text-md-right">Please verify your email. You can 

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
