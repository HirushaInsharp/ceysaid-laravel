<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
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

            $page = Page::filterSearchValue(['name', 'status'], $searchValue)
                        ->orderValue($orderColumn, $orderDir)
                        ->paginate($length);

            return PageResource::collection($page)->additional([
                'draw' => $request->draw
            ]);
        }
        $this->setTitle('Pages');
        $this->setBreadcrumbs([['name' => 'Pages', 'route' => null]]);
        return view('themes/admin/pages/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTitle('Create Page');
        $this->setBreadcrumbs([
            ['name' => 'Pages', 'route' => 'admin.pages.index'],
            ['name' => 'Create', 'route' => null]
        ]);

        return view('themes.admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $page = Page::create([
            'name' => $request->name,
            'description' => $request->description,
            'title' => $request->title
        ]);

        Session::flash('success', "New page has been created successfully.");
        Session::flash('info', 'Please update other data.');
        return redirect()->to(route('admin.pages.edit', [$page->id]));
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
    public function edit(Page $page)
    {
        $this->setTitle('Edit Page :: ' . $page->name);
        $this->setBreadcrumbs([
            ['name' => 'Pages', 'route' => 'admin.pages.index'],
            ['name' => 'Edit', 'route' => null]
        ]);

        return view('themes.admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        if ($request->get('edit_type') == 'info') {
            $page->update([
                'name' => $request->name,
                'description' => $request->description,
                'title' => $request->title,
            ]);

            if (Cache::has('company_description')) {
                Cache::forget('company_description');
            }
            Cache::forever('company_description', $request->description);

            Session::flash('success', "Page :: " . $page->name . " info has been updated successfully.");
        } elseif ($request->get('edit_type') == 'context') {
            $page->update([
                'context' => json_encode($request->context)
            ]);
            Session::flash('success', "Page :: ". $page->name . " context has been updated successfully.");
        } elseif ($request->get('edit_type') == 'seo') {
            $page->update([
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description
            ]);
            Session::flash('success', "Page :: " . $page->name . " seo has been updated successfully.");
        } elseif ($request->get('edit_type') == 'status') {
            $status = ($page->status == Page::STATUS_INACTIVE) ? Page::STATUS_ACTIVE : Page::STATUS_INACTIVE;

            Session::flash('success', "Page :: " . $page->name . " status has been updated successfully.");
            $page->update([
                'status' => $status
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
