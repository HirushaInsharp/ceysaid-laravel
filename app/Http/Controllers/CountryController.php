<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CountryMedia;
use App\Models\Page;
use App\Models\Tour;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $countries = Country::where('status', Country::STATUS_ACTIVE);

        //     if ($request->term) {
        //         $countries = $countries->where('name', 'like', $request->term . '%');
        //     }
        //     $countries = $countries->get();

        //     return view('themes.website.partials.country-item', compact('countries'))->render();
        // }

        $page = Page::where('slug', 'countries')->first();
        $countries = Country::with('CountryMedia')->with('tours')->where('status', Country::STATUS_ACTIVE)->get();


        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);

        return view('themes.website.countries', compact('countries', 'page'));
    }

    public function show(Request $request, $country_slug)
    {
        $country = Country::with('CountryMedia')->with('tours')->where('slug', $country_slug)->where('status', Country::STATUS_ACTIVE)->firstOrFail();
        $tours = Tour::with('tourMedia')->with('tourPrice')->with('tourDays')->where('status', Tour::STATUS_ACTIVE)->where('country_id',$country->id)->get();
        // if ($request->ajax()) {
        //     $tours = Tour::where('country_id', $country->id)->where('status', Tour::STATUS_ACTIVE);

        //     if ($request->term) {
        //         $term = $request->term;
        //         $tours = $tours->where(function ($query) use ($term) {
        //             return $query->where('name', 'like', '%' . $term . '%')
        //             ->orWhere('main_destinations', 'like', '%' . $term . '%');
        //         });
        //     }
        //     $tours = $tours->get();

        //     return view('themes.website.partials.tour-item', compact('tours'))->render();
        // }

        $this->setPageTitle(null, $country->name);
        $this->setPageDescription($country->description);

        return view('themes.website.country', compact('country','tours'));
    }
}
