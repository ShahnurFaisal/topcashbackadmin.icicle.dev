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
        dd($nearestLocationId);
        return response()->json(['nearest_location_id' => $nearestLocationId]);
    }
}
