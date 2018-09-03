<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.index');
    }
    public function search(Request $request)
    {
        // API key placeholders that must be filled in by users.
        // You can find it on
        // https://www.yelp.com/developers/v3/manage_app
        $APIKey = env('API_KEY');
        // Complain if credentials haven't been filled out.
        // assert($APIKey, "Please supply your API key.");

        // API constants, you shouldn't have to change these.
        $host = "https://api.yelp.com";
        $path = "/v3/businesses/search";
        $businessPath = "/v3/businesses/";  // Business ID will come after slash.
        
        // Set Location
        $location = "Naperville, IL";


        function request($host, $path, $url_params = array()) {
            // Send Yelp API Call
            try {
                $curl = curl_init();
                if (FALSE === $curl)
                    throw new Exception('Failed to initialize');
                $url = $host . $path . "?" . http_build_query($url_params);
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,  // Capture response.
                    CURLOPT_ENCODING => "",  // Accept gzip/deflate/whatever.
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "authorization: Bearer " . $API_KEY,
                        "cache-control: no-cache",
                    ),
                ));
                $response = curl_exec($curl);
                if (FALSE === $response)
                    throw new Exception(curl_error($curl), curl_errno($curl));
                $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                if (200 != $http_status)
                    throw new Exception($response, $http_status);
                curl_close($curl);
            } catch(Exception $e) {
                trigger_error(sprintf(
                    'Curl failed with error #%d: %s',
                    $e->getCode(), $e->getMessage()),
                    E_USER_ERROR);
            }
            return $response;
        }

        $input = $request->input('location');
        return view('layouts.search', compact('input'));
    }
}
