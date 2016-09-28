<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use GuzzleHttp\Client;

class kentekenController extends Controller
{

    /**
     *  Show the form for finding a vehicle from a license plate
     */
    public function createKenteken()
    {
        return view('dashboard.occasions.createkenteken');
    }

    public function getKenteken(Request $request)
    {
        if($request->ajax())
        {
            if(!empty($_GET['kenteken']))
            {
                $kenteken = $_GET['kenteken'];

                // Create a client with a base URI
                $client = new Client(['base_uri' => 'https://opendata.rdw.nl/resource/m9d7-ebf2.json/']);
                // Send a request to https://foo.com/api/test
                $response = $client->request('GET', 'https://opendata.rdw.nl/resource/m9d7-ebf2.json/', [
                    'query' => ['kenteken' => $kenteken],
                    '$$app_token' => "jXeaLkYpRZm4dwaLjGh7KlY9C"
                ]);

                $data = $response->getBody();
                $data = json_decode($data, false);

                return $data;
            }
            else
            {
                return 'No kenteken given';
            }
        }
        else
        {
            return 'Not an AJAX call';
        }
    }

    public function parseKenteken(Request $request)
    {
        $data = $request->all();

        $keys_to_parse = [
            'aantal_cilinders',
            'aantal_deuren',
            'bruto_btpm',
            'datum_eerste_afgifte_nederland',
            'datum_eerste_toelating',
            'datum_tenaamstelling',
            'inrichting',
            'massa_ledig_voertuig',
            'massa_rijklaar',
            'handelsbenaming',
            'merk',
            'uitvoering',
            'variant'
        ];

        $data_to_parse = array();

        foreach($keys_to_parse as $key)
        {
            if(array_key_exists($key, $data))
            {
                $data_to_parse[$key] = $data[$key];
            }
        }

        return $data_to_parse;
        return redirect('dashboard/occasion/create')->with($data_to_parse);
    }
}
