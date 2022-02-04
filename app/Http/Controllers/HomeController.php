<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $countries = Country::where('status', Country::STATUS_ACTIVE)->limit(9)->get();

        $page = Page::where('slug', 'home')->first();

        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);
        return view('themes.website.index', compact('countries', 'page'));
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
