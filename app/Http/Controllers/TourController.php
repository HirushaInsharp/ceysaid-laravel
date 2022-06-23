<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Country;
use App\Models\Page;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tours = Tour::where('status', Tour::STATUS_ACTIVE);

            if ($request->term) {
                $tours = $tours->where('name', 'like', '%' .$request->term . '%')
                                ->orWhere('main_destinations', 'like', '%' .$request->term . '%');
            }
            $tours = $tours->get();

            return view('themes.website.partials.tour-item', compact('tours'))->render();
        }

        $page = Page::where('slug', 'tours')->first();

        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);

        return view('themes.website.tours');
    }

    public function show($country_slug, $tour_slug)
    {
        $country = Country::where('slug', $country_slug)->where('status', Country::STATUS_ACTIVE)->firstOrFail();
        $tour = Tour::where('country_id', $country->id)->where('slug', $tour_slug)->where('status', Tour::STATUS_ACTIVE)->firstOrFail();

        return view('themes.website.tour', compact('country', 'tour'));
    }

    public function sendEmailTOAdmin(Request $request)
    {
        $month = $request->tourDate;
        $details = [
            'title' => $request->tour_name,
            'name' => $request->name,
            'email' => $request->email,
            'month' => $request->$month
        ];
       
        \Mail::to('hirusharandunu11@gmail.com')->send(new \App\Mail\TourSubscriptionMail($details));
       
        

        return redirect()->back();
    }
}
