<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\Country;
use Illuminate\Http\Request;

class TourController extends Controller
{
    //
    public function view($slug){
         
        $contry = Country::where('slug', $slug)->with('tours')->first();      
     
        // $tours = Tour
        return view('themes.website.tours',['tours'=> $contry->tours,'contry'=>$slug]);
    }
    public function viewSingleTour($country , $tour_slug){         
         $tour_data = Tour::where('slug', $tour_slug)->with('tourDays','tourMedia','tourPrice','tourDataGroup')->first();
         //dd($tour_data);      
         return view('themes.website.tour',['tour'=>$tour_data, 'tourDays'=>$tour_data->tourDays, 'tourMedia'=> $tour_data->tourMedia, 'tourPrice'=>$tour_data->tourPrice,'tourDataGroup'=>$tour_data->tourDataGroup]);
        // return view('themes.website.tours',['tours'=> $contry->tours]);
    }
}
