<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function findNearestLocation($latitude, $longitude)
    {
        $nearestLocation = Location::selectRaw('id, ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance')
            ->orderBy('distance', 'asc')
            ->take(1)
            ->get([$latitude, $longitude, $latitude]);


        $nearestLocationId = $nearestLocation->first()->id;
        // You can do more with $nearestLocationId here or return it as a response.

        return response()->json(['nearest_location_id' => $nearestLocationId]);
    }




    public function index(Request $request)
    {
        $lat = YOUR_CURRENT_LATITUDE;
        $lon = YOUR_CURRENT_LONGITUDE;

        $users = User::select("users.id",
            DB::raw("6371 * acos(cos(radians(" . $lat . "))
                * cos(radians(users.lat))
                * cos(radians(users.lon) - radians(" . $lon . "))
                + sin(radians(" . $lat . "))
                * sin(radians(users.lat))) AS distance"))
            ->groupBy("users.id")
            ->get();

        dd($users);
    }
}
