<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribedRequest;
use App\Models\Country;
use App\Models\Page;
use App\Models\Subscribe;
use App\Models\Testimonial;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $countries = Country::with('CountryMedia')->with('tours')->where('status', Country::STATUS_ACTIVE)->limit(4)->get();
        $page = Page::where('slug', 'home')->first();

        $tours = Tour::with('country')->with('tourMedia')->with('tourPrice')->with('tourDays')->where('status', Tour::STATUS_ACTIVE)->limit(4)->get();
        $settings= Setting::where('value' ,'!=', '')->get();
        //dd(count($countries[0]->CountryMedia));
        //dd(count($tours[0]->tourMedia)-1);
        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);
        return view('themes.website.index', compact('countries', 'page','tours','settings'));
    }

    public function aboutUs()
    {
        $page = Page::where('slug', 'about-us')->first();
        $settings= Setting::where('value' ,'!=', '')->get();
        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);

        $testimonials = Testimonial::where('status', Testimonial::STATUS_ACTIVE)->get();

        return view('themes.website.about-us', compact('page', 'testimonials','settings'));
    }

    public function contactUs()
    {
        $page = Page::where('slug', 'contact-us')->first();
        $settings= Setting::where('value' ,'!=', '')->get();
        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);
        return view('themes.website.contact-us',compact('settings'));
    }

    public function subscribe(SubscribedRequest $request)
    {
        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->save();
        
        return json_encode(['success' => "Thank you for subscribe us"]);
    }
}
