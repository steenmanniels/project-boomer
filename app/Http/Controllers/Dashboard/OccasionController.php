<?php

namespace App\Http\Controllers\Dashboard;

// Use to account for changed namespace '\Dashboard'
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Occasion;
use App\Models\Make;

use Illuminate\Http\Response;
use Input;

use GuzzleHttp\Client;
use Illuminate\Http\Request;



class OccasionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occasions = Occasion::paginate(25);

        return view('dashboard.occasions.index')->with('occasions', $occasions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /**
         * Fetch all makes from database and save
         * them in an array to be sent to the
         * view
         */

        $makes = new Make;
        $make_names = $makes::all();

        $makes_array = ['null' => 'Merk'];

        foreach($make_names as $make_name)
        {
            $id = $make_name['make_id'];
            $name = $make_name['name'];

            $makes_array[$id] = $name;
        }

        if(!empty($_GET))
        {
            $parsed_data = $_GET;

            return view('dashboard.occasions.create')->with(['makes' => $makes_array, 'get_vars' => $parsed_data]);
        }
        else
        {
            return view('dashboard.occasions.create')->with('makes', $makes_array);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /**
         * This array is used to exclude certain input keys from the
         * array to be stored in the database via a model. This
         * is done either when a key is not available in the database
         * or when a key has to be altered.
         */

        $exclude_from_array = [
            '_token' => '',
            'model_input' => '',
            'type_input' => ''
        ];

        /**
         * Get all input data from the create page as an array.
         * This array will get parsed into the database via
         * an Eloquent model after having some data parsed
         * and deleted first
         */

        $input_array = $request->all();
        var_dump($input_array);

        /**
         * Insert either text or select input field from form
         * for model or type based on which was visible at the time
         * of submitting
         */

        if($input_array['model_input'] == 'select') {
            if(!empty($input_array['select_model'])) {
                $input_array['model'] = $input_array['select_model'];
            } else {
                $input_array['model'] = 'model';
            }
        } else {
            $input_array['model'] = $input_array['model'];
        }

        if($input_array['type_input'] == 'select') {
            if(!empty($input_array['select_type'])) {
                $input_array['type'] = $input_array['select_type'];
            } else {
                $input_array['type'] = 'type';
            }
        } else {
            $input_array['type'] = $input_array['type'];
        }

        /**
         * Remove certain values from the input array based on
         * the exclude_from_array variable, either because keys
         * are not (yet) present in database table or are temporaryily
         * added just for this controller
         */

        $input_array = array_diff_key($input_array, $exclude_from_array);
        var_dump($input_array);

        /**
         * Create occasion in database,
         * grab insert idea and redirect
         * to page for images to be added
         */

        if($occasion = Occasion::create($input_array)) {

            $last_insert_id = $occasion->id;
            return redirect('dashboard/image/' . $last_insert_id .'/create')->with('id', $last_insert_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $occasion = new Occasion;
        $data = $occasion::where('id', $id)->get();

        return view('dashboard.occasions.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occasion = Occasion::find($id);

        $make_names = Make::all();

        $makes_array = ['null' => 'Merk'];

        foreach($make_names as $make_name)
        {
            $id = $make_name['make_id'];
            $name = $make_name['name'];

            $makes_array[$id] = $name;
        }

        return view('dashboard.occasions.edit', ['occasion' => $occasion, 'makes' => $makes_array]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function editPhotos($id)
    {
        return view('dashboard.occasions.editphotos')->with('id', $id);
    }

    /**
     * @param Request $request
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getModel(Request $request)
    {
        if($request->ajax())
        {
            if(!empty($_GET['id']))
            {
                $makeID = $_GET['id'];

                $client = new Client(['base_uri' => 'http://www.carqueryapi.com/api/0.3/']);
                $res = $client->request('GET', 'http://www.carqueryapi.com/api/0.3/', [
                    'query' => [
                        'cmd' => 'getModels',
                        'make' => $makeID
                    ]
                ]);
            }

            $models = $res->getBody();
            $models = json_decode($models, true);

            return $models;
        }
        else
        {
            return 'No fresh';
        }
    }

    /**
     * @param Request $request
     * @return \Psr\Http\Message\StreamInterface|string
     */
    public function getTrim(Request $request)
    {
        if($request->ajax())
        {
            if(!empty($_GET['model']))
            {
                $modelID = $_GET['model'];
                $makeID = $_GET['make'];

                $client = new Client(['base_uri' => 'http://www.carqueryapi.com/api/0.3/']);
                $res = $client->request('GET', 'http://www.carqueryapi.com/api/0.3/', [
                    'query' => [
                        'cmd' => 'getTrims',
                        'make' => $makeID,
                        'model' => $modelID
                    ]
                ]);
            }

            $trims = $res->getBody();
            $trims = json_decode($trims, true);

            return $trims;
        }
        else
        {
            return 'No fresh';
        }
    }
}
