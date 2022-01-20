<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestimonialRequest;
use App\Http\Requests\Admin\UpdateTestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $testimornials = Testimonial::all();
            return TestimonialResource::collection($testimornials);
        }

        $this->setTitle('Testimonial');
        $this->setBreadcrumbs([['name' => 'Testimonial', 'route' => null]]);
        return view('themes/admin/testimonials/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTitle('Create Testimonial');
        $this->setBreadcrumbs([
            ['name' => 'Testimonials', 'route' => 'admin.testimonials.index'],
            ['name' => 'Create', 'route' => null]
        ]);

        $tours = Tour::where('status', Tour::STATUS_ACTIVE)->get();
        return view('themes.admin.testimonials.create', compact('tours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialRequest $request)
    {
        Testimonial::create([
            'name' => $request->name,
            'testimonial' => $request->testimonial,
            'tour_id' => $request->tour_id
        ]);

        Session::flash('success', "New testimonial has been created successfully.");
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $this->setTitle('Edit Testimonial :: ' . $testimonial->id);
        $this->setBreadcrumbs([
            ['name' => 'Testimonials', 'route' => 'admin.testimonials.index'],
            ['name' => 'Edit', 'route' => null]
        ]);
        $tours = Tour::where('status', Tour::STATUS_ACTIVE)->get();

        return view('themes.admin.testimonials.edit', compact('testimonial', 'tours'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        if ($request->get('edit_type') == 'status') {
            $status = ($testimonial->status == Testimonial::STATUS_INACTIVE) ? Testimonial::STATUS_ACTIVE : Testimonial::STATUS_INACTIVE;

            Session::flash('success', "Testimonial :: " . $testimonial->id . " status has been updated successfully.");
            $testimonial->update([
                'status' => $status
            ]);
        } else if ($request->get('edit_type') == 'info') {
            $testimonial->update([
                'name' => $request->name,
                'testimonial' => $request->testimonial,
                'tour_id' => $request->tour_id
            ]);

            Session::flash('success', "Testimonial has been updated successfully.");
        }
        Session::flash('edit_type', $request->get('edit_type'));
        return redirect()->back();
    }
}
