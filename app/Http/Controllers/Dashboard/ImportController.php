<?php


namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Occasion;

use Illuminate\Support\Facades\Input;

use Request;
use Excel;
use Validator;
use Redirect;
use Session;
use Carbon\Carbon;

class ImportController extends Controller
{
    public $numberOfInsertions = 0;

    /*
     * Index of the importing page
     */

    public function index()
    {
        return view('dashboard.occasions.import');
    }

    /*
     * Handles form data from the import index, moves file and redirects to handling page
     */

    public function store()
    {
        $file = array('excelFile' => Input::file('excelFile'));
        $rules = array('excelFile' => 'required');

        $validator = Validator::make($file, $rules);
        if($validator->fails())
        {
            return redirect('dashboard/import')->withInput()->withErrors($validator);
        }
        else
        {
            if(Input::file('excelFile')->isValid())
            {
                $destinationPath = 'uploads';
                $extension = Input::file('excelFile')->getClientOriginalExtension();
                $now = Carbon::now();
                $fileName = $now->toDateTimeString();
                $fileName = str_replace(['-', ':', ' '], "", $fileName);

                $fileName = $fileName . '.' . $extension;

                Input::file('excelFile')->move($destinationPath, $fileName);

                Excel::load($destinationPath . '/' . $fileName, function($reader) {
                    // Getting all results
                    $reader->each(function($sheet)
                    {

                        // Fetch kenteken from row
                        $kenteken = $sheet->kenteken;
                        // Remove dashes(-) from kenteken
                        $kenteken = str_replace('-', '', $kenteken);
                        // Uppercase kenteken
                        $kenteken = strtoupper($kenteken);

                        // Create new Occasion model
                        $occasion = new Occasion;

                        // Avoid duplicates
                        $occasionExists = $occasion->where('kenteken', $kenteken)->count();

                        //If occasion is not yet present
                        if(!$occasionExists)
                        {
                            // Fetch fields from row
                            $merk = $sheet->merk;
                            $model = $sheet->model;

                            // Insert data in Eloquent model
                            $occasion->kenteken = $kenteken;
                            $occasion->merk = $merk;
                            $occasion->model = $model;

                            // Save model
                            $occasion->save();

                            $this->numberOfInsertions++;
                        }
                        else
                        {
                            echo 'Occasion already exists!';
                        }
                    });
                });

                echo $this->numberOfInsertions;
                Session::flash('success', 'Upload succesful');
                Session::flash('message', $this->numberOfInsertions . ' occasions added to the database');
                //return redirect('dashboard/import');
            }
            else
            {
                echo 'Upload file invalid';
                Session::flash('error', 'Upload file invalid');
                return redirect('dashboard/import');
            }
        }
    }

    /*
     * Page displaying the contents of the Excel-file to be added to the database
     */

    public function show()
    {
        $data = Session::get('data')->destinationPath;

        return view('dashboard.show-import')->with('data', $data);
    }
}
