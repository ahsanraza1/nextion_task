<?php

namespace App\Http\Controllers\ThirdParty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightApiController extends Controller
{
    public function makeApiRequest()
{
    
}

public function flightAPi(Request $request){
    $currentDate = now()->format('Y-m-d');
    $today_flights = 0;
    $flight_statuses = [
        'scheduled'=>0,
        'active'=>0,
        'landed'=>0,
        'diverted'=>0,
        'incident'=>0,
        'cancelled'=>0,

    ];
    $response = Http::timeout(60)->get('http://api.aviationstack.com/v1/flights?access_key=0d83cbc33b406a46f233204562b03081');
    // $response = Http::timeout(60)->get('http://api.aviationstack.com/v1/airlines?access_key=0d83cbc33b406a46f233204562b03081');
    // dd($response->json());
    $data = $response->json()['data'];

    foreach($data as $flight){
        if( $flight['flight_date'] == $currentDate){
            $today_flights++;
        }

        $flightStatus = $flight['flight_status'];
        if (isset($flight_statuses[$flightStatus])) {
            $flight_statuses[$flightStatus]++;
        }
    }
    // dd($today_flights);
    // dd($currentDate);
        return view('main.pages.flightapi', compact('today_flights', 'flight_statuses'));
    }
}
