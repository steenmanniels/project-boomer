<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Make;
use GuzzleHttp\Client;
use Excel;

class AppController extends Controller
{
    public function cronjob()
    {
        Excel::load('car_makes.csv', function($reader) {
            // Getting all results
            $reader->each(function($sheet)
            {
                $make = new Make;

                $make_id = $sheet->make_id;

                $makeExists = $make->where('make_id', $make_id)->count();

                //If occasion is not yet present
                if(!$makeExists) {
                    $make->make_id = $sheet->make_id;
                    $make->name = $sheet->make_display;
                    $make->country = $sheet->make_country;

                    if ($make->save()) {
                        echo 'make saved!';
                        echo '<pre>';
                        var_dump($sheet);
                        echo '</pre>';
                    } else {
                        echo 'make not saved!';
                    }
                }
                else
                {
                    echo 'make already exists!';
                }

            });
        });
/*        // Create a client with a base URI
        $client = new Client(['base_uri' => 'http://www.carqueryapi.com/api/0.3/']);
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'http://www.carqueryapi.com/api/0.3/', [
            'query' => [
                'cmd' => 'getYears'
            ]
        ]);

        $data = $response->getBody();
        $data = json_decode($data, true);
        $data = $data['Years'];

        if($data)
        {
            $offset_min = $data['min_year'];
            $offset_max = $data['max_year'];

            $offset = $offset_max - $offset_min;

            for($i = 0; $i <= 0; $i++)
            {
                $year = $offset_min + $i;
                $res = $client->request('GET', 'http://www.carqueryapi.com/api/0.3/', [
                    'query' => [
                        'cmd' => 'getMakes',
                        'year' => '2016'
                    ]
                ]);

                $models = $res->getBody();
                $models = json_decode($models, true);

                var_dump($models);
            }
        }
*/
    }
}
