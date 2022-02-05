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
        if ($request->ajax()) {
            $countries = Country::where('status', Country::STATUS_ACTIVE);

            if ($request->term) {
                $countries = $countries->where('name', 'like', $request->term . '%');
            }
            $countries = $countries->get();

            return view('themes.website.partials.country-item', compact('countries'))->render();
        }

        $page = Page::where('slug', 'countries')->first();

        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);

        return view('themes.website.countries');
    }

    public function show(Request $request, $country_slug)
    {
        $country = Country::where('slug', $country_slug)->where('status', Country::STATUS_ACTIVE)->firstOrFail();

        if ($request->ajax()) {
            $tours = Tour::where('country_id', $country->id)->where('status', Tour::STATUS_ACTIVE);

            if ($request->term) {
                $tours = $tours->where('name', 'like', '%' .$request->term . '%')
                                ->orWhere('main_destinations', 'like', '%' .$request->term . '%');
            }
            $tours = $tours->get();

            return view('themes.website.partials.tour-item', compact('tours'))->render();
        }

        $this->setPageTitle(null, $country->name);
        $this->setPageDescription($country->description);

        return view('themes.website.country', compact('country'));
    }
}
