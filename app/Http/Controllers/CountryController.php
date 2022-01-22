<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CountryMedia;

class CountryController extends Controller
{
    //

    public function view(){
        $contries= Country::with('CountryMedia')->get();
        
        return view('themes.website.index',['contries' => $contries]);
    }
}
