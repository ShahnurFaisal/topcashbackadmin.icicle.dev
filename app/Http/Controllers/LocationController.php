<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    //
    public function index(Request $request) {

          $latitude = 37.7749; // Example latitude value
        $longitude = -122.4194; // Example longitude value

        // Define the radius within which to search for nearest offers
        $radius = 10; // Kilometers

        $showResult = DB::table("users")
            ->select("users.id"
                ,DB::raw("55555 * acos(cos(radians(" . $latitude . "))
                * cos(radians(users.lat))
                * cos(radians(users.lon) - radians(" . $longitude . "))
                + sin(radians(" .$latitude. "))
                * sin(radians(users.lat))) AS distance"))
                ->groupBy("users.id")
                ->having("distance", "<=", $radius)
                ->get();

      dd($showResult);
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
