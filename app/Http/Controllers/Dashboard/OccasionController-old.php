<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Request;
use Excel;
use Validator;
use Redirect;
use Session;

class OccasionController extends Controller
{
    /*
     * Free importing of occasions using a broad variety
     * of form input elements
     */

    public function addOccasion() 
    {
        return view('dashboard.occasions.addemptyoccasion');
    }

    /*
     * View all occasions
     */
    
    public function occasions()
    {
        
    }
    
    /*
     * Demo route for retreiving vehicle data based
     * upon license plate number
     */

    public function kenteken()
    {
        // Create a client with a base URI
        $client = new Client(['base_uri' => 'https://opendata.rdw.nl/resource/m9d7-ebf2.json/']);
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'https://opendata.rdw.nl/resource/m9d7-ebf2.json/', [
            'query' => ['kenteken' => '76KZH9'],
            '$$app_token' => "jXeaLkYpRZm4dwaLjGh7KlY9C"
        ]);

        $data = $response->getBody();
        $data = json_decode($data, false);

        return $data;
    }
}
