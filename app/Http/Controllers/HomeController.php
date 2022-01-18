<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('themes.website.index');
    }

    public function showCountries()
    {
        return view('themes.website.countries');
    }

    public function showTours()
    {
        return view('themes.website.tours');
    }

    public function showTour()
    {
        return view('themes.website.tour');
    }
}
