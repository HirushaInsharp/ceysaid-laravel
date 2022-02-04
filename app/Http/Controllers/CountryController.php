<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CountryMedia;
use App\Models\Tour;

class CountryController extends Controller
{
    public function show($country_slug)
    {
        $country = Country::where('slug', $country_slug)->where('status', Country::STATUS_ACTIVE)->firstOrFail();
        $tours = Tour::where('country_id', $country->id)->where('status', Tour::STATUS_ACTIVE)->get();

        $this->setPageTitle(null, $country->name);
        $this->setPageDescription($country->description);

        return view('themes.website.country', compact('country', 'tours'));
    }
    public function view(){
        $contries= Country::with('CountryMedia')->get();

        return view('themes.website.index',['contries' => $contries]);
    }
}
