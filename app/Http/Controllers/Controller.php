<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cache;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setTitle($title)
    {
        view()->share('title', $title);
    }

    public function setBreadcrumbs($breadcrumbs)
    {
        view()->share('breadcrumbs', $breadcrumbs);
    }

    public function setPageTitle($title, $name)
    {
        $this->companyDescription();

        if ($title) {
            view()->share('page_title', $title);
        } else {
            view()->share('page_title', $name);
        }
    }

    public function setPageDescription($description)
    {
        view()->share('page_description', $description);
    }

    public function companyDescription()
    {
        $description = "";

        if (Cache::has('company_description')) {
            $description = Cache::get('company_description');
        } else {
            $page = Page::where('slug', 'about-us')->first();

            if ($page) {
                $description = $page->description;
                Cache::forever('company_description', $page->description);
            }
        }

        view()->share('company_description', $description);
    }
}
