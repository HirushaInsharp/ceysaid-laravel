<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTourRequest;
use App\Http\Requests\Admin\UpdateTourRequest;
use App\Http\Resources\TourResource;
use App\Models\Country;
use App\Models\Tour;
use App\Models\TourData;
use App\Models\TourDataGroup;
use App\Models\TourDay;
use App\Models\TourMedia;
use App\Models\TourPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourController extends Controller
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

            $tours = Tour::filterSearchValue(['name', 'status'], $searchValue)
                            ->orderValue($orderColumn, $orderDir)
                            ->paginate($length);

            return TourResource::collection($tours)->additional([
                'draw' => $request->draw
            ]);
        }
        $this->setTitle('Tours');
        $this->setBreadcrumbs([['name' => 'Tours', 'route' => null]]);
        return view('themes/admin/tours/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTitle('Create Tour');
        $this->setBreadcrumbs([
            ['name' => 'Tours', 'route' => 'admin.tours.index'],
            ['name' => 'Create', 'route' => null]
        ]);

        $countries = Country::where('status', Country::STATUS_ACTIVE)->get();
        return view('themes.admin.tours.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTourRequest $request)
    {
        $slug = Str::slug($request->name . "-". $request->days . "-days");

        $tour = Tour::create([
            'name' => $request->name,
            'slug' => $slug,
            'main_destinations' => $request->main_destinations,
            'description' => $request->description,
            'days' => $request->days,
            'country_id' => $request->country_id,
            'user_id' => auth('admin')->user()->id
        ]);

        $this->tourDays($tour, $request->days);

        Session::flash('success', "New tour has been created successfully.");
        Session::flash('info', 'Please update other data.');
        return redirect()->to(route('admin.tours.edit', [$tour->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour)
    {
        $this->setTitle('Edit Tour :: ' . $tour->name);
        $this->setBreadcrumbs([
            ['name' => 'Tours', 'route' => 'admin.tours.index'],
            ['name' => 'Edit', 'route' => null]
        ]);
        $countries = Country::where('status', Country::STATUS_ACTIVE)->get();

        return view('themes.admin.tours.edit', compact('tour', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTourRequest $request, Tour $tour)
    {
        if ($request->get('edit_type') == 'info') {
            $tour->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'main_destinations' => $request->main_destinations,
                'days' => $request->days,
                'country_id' => $request->country_id,
                'min_age' => $request->min_age,
                'max_ppl' => $request->max_ppl,
                'start_place' => $request->start_place,
                'start_date' => $request->start_date,
                'end_place' => $request->end_place,
                'end_date' => $request->end_date
            ]);
            $this->tourDays($tour, $request->days);

            Session::flash('success', "Tour :: ". $tour->name . " info has been updated successfully.");
        } elseif ($request->get('edit_type') == 'context') {
            $tour->update([
                'context' => json_encode($request->context)
            ]);
            Session::flash('success', "Tour :: ". $tour->name . " context has been updated successfully.");
        } elseif ($request->get('edit_type') == 'seo') {
            $tour->update([
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description
            ]);
            Session::flash('success', "Tour :: " . $tour->name . " seo has been updated successfully.");
        } elseif ($request->get('edit_type') == 'status') {
            $status = ($tour->status == Tour::STATUS_INACTIVE) ? Tour::STATUS_ACTIVE : Tour::STATUS_INACTIVE;
            $tour->update([
                'status' => $status
            ]);
            Session::flash('success', "Tour :: " . $tour->name . " status has been updated successfully.");
        } elseif ($request->get('edit_type') == 'featured' || $request->get('edit_type') == 'background' || $request->get('edit_type') == 'pdf') {
            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $this->removeExistingFile($tour->featured_image_url);
                $this->fileUpload($file, $tour, TourMedia::TYPE_FEATURE_IMAGE);
                Session::flash('success', "Tour :: " . $tour->name . " featured image has been uploaded successfully.");
            }

            if ($request->hasFile('background_image')) {
                $file = $request->file('background_image');
                $this->removeExistingFile($tour->background_image_url);
                $this->fileUpload($file, $tour, TourMedia::TYPE_BACKGROUND_IMAGE);
                Session::flash('success', "Tour :: " . $tour->name . " background image has been uploaded successfully.");
            }

            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $this->removeExistingFile($tour->pdf_url);
                $this->fileUpload($file, $tour, TourMedia::TYPE_TOUR_PDF);
                Session::flash('success', "Tour :: " . $tour->name . " pdf file has been uploaded successfully.");
            }

            if ($request->remove_featured_image) {
                $this->removeExistingFile($tour->featured_image_url);
                Session::flash('success', "Tour :: " . $tour->name . " featured image has been deleted successfully.");
                $tour->tourMedia()->where('type', TourMedia::TYPE_FEATURE_IMAGE)->delete();
            }

            if ($request->remove_background_image) {
                $this->removeExistingFile($tour->background_image_url);
                Session::flash('success', "Tour :: " . $tour->name . " background image has been deleted successfully.");
                $tour->tourMedia()->where('type', TourMedia::TYPE_BACKGROUND_IMAGE)->delete();
            }

            if ($request->remove_pdf) {
                $this->removeExistingFile($tour->pdf_url);
                Session::flash('success', "Tour :: " . $tour->name . " pdf has been deleted successfully.");
                $tour->tourMedia()->where('type', TourMedia::TYPE_TOUR_PDF)->delete();
            }
            if ($request->download_pdf) {
                $headers = array(
                    'Content-Type: application/pdf',
                    'Content-Type: application/docx',
                );
                $file = explode('/', $tour->pdf_url);
                $fileName = $file[count($file) - 1];
                return Storage::disk('public')->download($tour->pdf_url, $fileName, $headers);
            }
        } elseif ($request->get('edit_type') == 'tour_days') {
            $title = $request->title;
            $description = $request->day_description;
            for ($i = 0; $i < $tour->days; $i++) {
                TourDay::where('tour_id', $tour->id)->where('day', $i + 1)->update([
                    'title' => isset($title[$i]) ? $title[$i] : null,
                    'description' => isset($description[$i]) ? $description[$i] : null
                ]);
            }

            Session::flash('success', "Tour :: " . $tour->name . " days data has been updated successfully.");
        } elseif ($request->get('edit_type') == 'price') {
            $amounts = $request->amount;
            $priceIds = $request->price_id;

            for ($i = 0; $i < count(Tour::PRICE_CODES); $i++) {
                if (!$priceIds[$i]) {
                    $tourPrice = new TourPrice();
                    $tourPrice->code = Tour::PRICE_CODES[$i];
                } else {
                    $tourPrice = TourPrice::find($priceIds[$i]);
                }
                $tourPrice->amount = $amounts[$i];
                $tour->tourPrice()->save($tourPrice);
            }
            Session::flash('success', "Tour :: " . $tour->name . " price data has been updated successfully.");
        } elseif ($request->get('edit_type') == 'include') {
            $this->tourData($request, $tour, TourDataGroup::PRICE_INCLUDE);
            Session::flash('success', "Tour :: " . $tour->name . "  tour include data has been updated successfully.");
        } elseif ($request->get('edit_type') == 'exclude') {
            $this->tourData($request, $tour, TourDataGroup::PRICE_EXCLUDE);
            Session::flash('success', "Tour :: " . $tour->name . "  tour exclude data has been updated successfully.");
        }

        Session::flash('edit_type', $request->get('edit_type'));
        return redirect()->back();
    }

    private function tourData($request, $tour, $section)
    {
        $groups = $request->get('groups') ?? [];
        $groupIds = $request->get('group_ids') ?? [];
        $groupId = 1;


        $deleteGroupIds = TourDataGroup::whereNotIn('id', $groupIds)
                                        ->where('tour_id', $tour->id)
                                        ->where('section', $section)
                                        ->pluck('id')
                                        ->toArray();

        TourData::whereIn('tour_data_group_id', $deleteGroupIds)->delete();
        TourDataGroup::whereIn('id', $deleteGroupIds)->delete();

        for ($i = 0; $i < count($groups); $i++) {
            if (isset($groupIds[$i])) {
                $tourDataGroup = TourDataGroup::find($groupIds[$i]);
            } else {
                $tourDataGroup = new TourDataGroup();
                $tourDataGroup->section = $section;
                $tourDataGroup->tour_id = $tour->id;
            }
            $tourDataGroup->name = $groups[$i];
            $tourDataGroup->save();

            $itemIds = $request->get('item_ids_' . $groupId) ?? [];
            $items = $request->get('items_' . $groupId) ?? [];

            for ($x = 0; $x < count($itemIds); $x++) {
                $tourData = TourData::find($itemIds[$x]);
                $tourData->item = $items[$x];
                $tourData->tour_data_group_id = $tourDataGroup->id;
                $tourData->save();
            }
            TourData::whereNotIn('id', $itemIds)->where('tour_data_group_id', $tourDataGroup->id)->delete();

            for ($j = $x; $j < count($items); $j++) {
                $tourData = new TourData();
                $tourData->item = $items[$j];
                $tourData->tour_data_group_id = $tourDataGroup->id;
                $tourData->save();
            }

            $groupId += 100;
        }
    }

    private function tourDays($tour, $days)
    {
        if ($tour->tourDays->count() > $days) {
            $different = $tour->tourDays->count() - $days;
            $tour->tourDays()->orderBY('id', 'DESC')->limit($different)->delete();
        } elseif ($tour->tourDays->count() < $days) {
            $currentCount = $tour->tourDays->count();
            for ($i = $currentCount; $i < $days; $i++) {
                TourDay::create([
                    'tour_id' => $tour->id,
                    'day' => ($i + 1)
                ]);
            }
        }
    }

    private function fileUpload($file, $tour, $type)
    {
        $fileName = $file->getClientOriginalName();
        $destinationPath = "uploads/" . $tour->slug;
        $filePath = $file->storeAs($destinationPath, $fileName, 'public');

        $tourMedia = new TourMedia();
        $tourMedia->image_path = $filePath;
        $tourMedia->type = $type;
        $tour->tourMedia()->save($tourMedia);
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
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {
        //
    }
}
