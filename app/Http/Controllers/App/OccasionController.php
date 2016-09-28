<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Occasion;
use Illuminate\Http\Request;

use App\Http\Requests;

class OccasionController extends Controller
{
    public function __construct() 
    {
        
    }
    
    public function index() 
    {
        $occasions = Occasion::all();

        return view('app.occasion_index')->with('occasions', $occasions);
    }
}
