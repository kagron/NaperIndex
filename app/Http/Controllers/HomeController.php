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

    /**
     * GET /search?params
     * Show the search results from a yelp API request
     * using the term in the url
     */
    public function search(Request $request)
    {
        // Variables
        $input = $request->input('term');
        $page = $request->input('p');
        $numOnPage = 10;

        // Redirect to index if theres no input
        if (empty($input))
            return redirect()->route('index')->with('status', 'Search is empty');
        

        // API constants
        $host = "https://api.yelp.com";
        $path = "/v3/businesses/search";
        
        // Set Location
        $location = "Naperville, IL";


        // Set up the params array to go in our request to Yelp
        $params = array();
        $params['location'] = $location;
        $params['term'] = $input;
        $params['limit'] = $numOnPage;

        // Change offset based on page in url
        if(isset($page) && $page > 1) {
            $params['offset'] = ($numOnPage) * $page - $numOnPage;
        } else {
            $page = 1;
        }

        // Decode our response into a PHP object using the built in json_decode method
        $httpResponse = json_decode($this->request($host, $path, $params));

        // Return the view with our response
        return view('layouts.search', compact('httpResponse', 'input', 'page'));
    }

    /**
     * GET /businesses/business-alias
     * Retrieve business info for detailed page
     */
    public function info($alias)
    {

        // API constants
        $host = "https://api.yelp.com";
        $businessPath = "/v3/businesses/" . $alias;  // Business ID will come after slash.
        $reviewPath = $businessPath . "/reviews";



        // Decode our responses into a PHP object using the built in json_decode method
        $httpResponse = json_decode($this->request($host, $businessPath));
        $reviews = json_decode($this->request($host, $reviewPath));

        return view('layouts.info', compact('alias', 'reviews', 'httpResponse'));
    }

    // Create a request method using curl
    public function request($host, $path, $url_params = array()) {
        $APIKey = env('API_KEY');
        // Send Yelp API Call
        try {
            $curl = curl_init();
            if (FALSE === $curl)
                throw new Exception('Failed to initialize');
            $url = $host . $path . "?" . http_build_query($url_params);
            // Set headers
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,  // Capture response.
                CURLOPT_ENCODING => "",  // Accept gzip/deflate/whatever.
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer " . $APIKey,
                    "cache-control: no-cache",
                ),
            ));
            $response = curl_exec($curl);

            // Throw errors
            if (FALSE === $response)
                throw new Exception(curl_error($curl), curl_errno($curl));

            $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if (200 != $http_status)
                throw new Exception($response, $http_status);
            curl_close($curl);

        // Catch errors
        } catch(Exception $e) {
            trigger_error(sprintf(
                'Curl failed with error #%d: %s',
                $e->getCode(), $e->getMessage()),
                E_USER_ERROR);
        }
        return $response;
    }
}
