<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function convertAddressToCoordinates(Request $request)
    {
        $address = $request->query('address');
        $apiKey = 'YOUR_GOOGLE_MAPS_API_KEY';
        $client = new Client();
        $response = $client->get("https://maps.googleapis.com/maps/api/geocode/json", [
            'query' => [
                'address' => $address,
                'key' => $apiKey,
            ],
        ]);

        $data = json_decode($response->getBody());

        if ($data->status === 'OK') {
            $latitude = $data->results[0]->geometry->location->lat;
            $longitude = $data->results[0]->geometry->location->lng;

            return response()->json(['latitude' => $latitude, 'longitude' => $longitude]);
        } else {
            return response()->json(['error' => 'Geocoding error'], 400);
        }
    }

    //
    public function setShopAddress(Request $request)
    {
        // $address = $request->input('address');
        $postcode = $request->input('postcode');
        $apiKey = env('GEOCODING_API_KEY'); // Use environment variable for API key

        $response = Http::get("https://api.postcodes.io?postcode={$postcode}&key={$apiKey}");

        if ($response->successful()) {
            $data = $response->json();

            // Check if 'latitude' and 'longitude' keys exist in the response data
            if (isset($data['latitude']) && isset($data['longitude'])) {
                $latitude = $data['latitude'];
                $longitude = $data['longitude'];

                Location::create([
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);

                // Continue with any other logic you have
            } else {
                // Handle missing data structure here
                $errorMessage = 'Latitude or longitude data is missing.';
                return redirect()->back()->with('error', $errorMessage);
            }
        } else {
            // Handle API error
            $errorMessage = $response->json()['error'] ?? 'An error occurred.';
            return redirect()->back()->with('error', $errorMessage);
        }

    }
}
