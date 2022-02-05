<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribedRequest;
use App\Models\Country;
use App\Models\Page;
use App\Models\Subscribe;
use App\Models\Testimonial;
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

    public function aboutUs()
    {
        $page = Page::where('slug', 'about-us')->first();

        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);

        $testimonials = Testimonial::where('status', Testimonial::STATUS_ACTIVE)->get();

        return view('themes.website.about-us', compact('page', 'testimonials'));
    }

    public function contactUs()
    {
        $page = Page::where('slug', 'contact-us')->first();

        $this->setPageTitle($page->title, $page->name);
        $this->setPageDescription($page->description);
        return view('themes.website.contact-us');
    }

    public function subscribe(SubscribedRequest $request)
    {
        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->save();

        return json_encode(['success' => "Thank you for subscribe us"]);
    }
}
