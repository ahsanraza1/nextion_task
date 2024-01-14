@extends('main.dashboard')
@section('page')
    Flight Data
@endsection
@section('subpanel')
<style>
    .card{
        height: 150px;
    }
</style>
<div class="container mt-2">
    <h3> Flights Data </h3> 
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <!-- Card 1 -->
        <div class="col mb-4">
            <div class="card d-flex flex-column justify-content-center align-items-center">
                Today flights {{$today_flights}}
            </div>
        </div>
        


        <!-- Add more cards as needed -->
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <!-- Card 1 -->
        @foreach($flight_statuses as $status=>$fstatus)
        <div class="col-md-3 mb-4">
            <div class="card d-flex flex-column justify-content-center align-items-center" style="height: 150px">
                <strong>{{Str::ucfirst($status)}} flights</strong> {{ $fstatus}}
            </div>
        </div>
        @endforeach
        

        <!-- Add more cards as needed -->
    </div>
</div>
@endsection
