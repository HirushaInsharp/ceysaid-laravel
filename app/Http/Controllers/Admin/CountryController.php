<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Models\CountryMedia;
use App\Repositories\CountryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CountryController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $length = $request->length ?? 10;
            $orderColumn = $request->order[0]['column'];
            $orderDir = $request->order[0]['dir'] ?? 'ASC';
            $searchValue = $request->search['value'] ?? null;

            $countries = Country::filterSearchValue(['name', 'status'], $searchValue)
                                ->orderValue($orderColumn, $orderDir)
                                ->paginate($length);

            return CountryResource::collection($countries)->additional([
                'draw' => $request->draw
            ]);
        }

        $this->setTitle('Countries');
        $this->setBreadcrumbs([['name' => 'Countries', 'route' => null]]);
        return view('themes/admin/countries/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTitle('Create Country');
        $this->setBreadcrumbs([
            ['name' => 'Countries', 'route' => 'admin.countries.index'],
            ['name' => 'Create', 'route' => null]
        ]);
        return view('themes.admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        $country = Country::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth('admin')->user()->id
        ]);

        Session::flash('success', "New country has been created successfully.");
        Session::flash('info', 'Please update other data.');
        return redirect()->to(route('admin.countries.edit', [$country->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $this->setTitle('Edit Country :: ' . $country->name);
        $this->setBreadcrumbs([
            ['name' => 'Countries', 'route' => 'admin.countries.index'],
            ['name' => 'Edit', 'route' => null]
        ]);

        return view('themes.admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        if ($request->get('edit_type') == 'info') {
            $country->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
            Session::flash('success', "Country :: " . $country->name . " info has been updated successfully.");
        } elseif ($request->get('edit_type') == 'seo') {
            $country->update([
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description
            ]);
            Session::flash('success', "Country :: " . $country->name . " seo has been updated successfully.");
        } elseif ($request->get('edit_type') == 'status') {
            $status = ($country->status == Country::STATUS_INACTIVE) ? Country::STATUS_ACTIVE : Country::STATUS_INACTIVE;

            Session::flash('success', "Country :: " . $country->name . " status has been updated successfully.");
            $country->update([
                'status' => $status
            ]);
        } elseif ($request->get('edit_type') == 'featured' || $request->get('edit_type') == 'background') {
            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $this->removeExistingFile($country->featured_image_url);
                $this->fileUpload($file, $country, CountryMedia::TYPE_FEATURE_IMAGE);
                Session::flash('success', "Country :: " . $country->name . " featured image has been uploaded successfully.");
            }

            if ($request->hasFile('background_image')) {
                $file = $request->file('background_image');
                $this->removeExistingFile($country->background_image_url);
                $this->fileUpload($file, $country, CountryMedia::TYPE_BACKGROUND_IMAGE);
                Session::flash('success', "Country :: " . $country->name . " background image has been uploaded successfully.");
            }

            if ($request->remove_featured_image) {
                $this->removeExistingFile($country->featured_image_url);
                Session::flash('success', "Country :: " . $country->name . " featured image has been deleted successfully.");
                $country->countryMedia()->where('type', CountryMedia::TYPE_FEATURE_IMAGE)->delete();
            }

            if ($request->remove_background_image) {
                $this->removeExistingFile($country->background_image_url);
                Session::flash('success', "Country :: " . $country->name . " background image has been deleted successfully.");
                $country->countryMedia()->where('type', CountryMedia::TYPE_BACKGROUND_IMAGE)->delete();
            }
        }
        Session::flash('edit_type', $request->get('edit_type'));
        return redirect()->back();
    }

    private function fileUpload($file, $country, $type)
    {
        $fileName = $file->getClientOriginalName();
        $destinationPath = "uploads/" . $country->slug;
        $filePath = $file->storeAs($destinationPath, $fileName, 'public');

        $countryMedia = new CountryMedia();
        $countryMedia->image_path = $filePath;
        $countryMedia->type = $type;
        $country->countryMedia()->save($countryMedia);
    }

    private function removeExistingFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
    }
}
