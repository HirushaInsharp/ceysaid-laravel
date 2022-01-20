<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index()
    {
        $this->setTitle('Setting');
        $this->setBreadcrumbs([['name' => 'Setting', 'route' => null]]);

        return view('themes/admin/setting');
    }

    public function update(Request $request)
    {
        $settings = config('setting');

        foreach ($settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();

            if (!$setting) {
                $setting = new Setting();
                $setting->key = $key;
            }
            $setting->value = $request->get($key);
            $setting->save();

            if (Cache::has('setting_' . $key)) {
                Cache::forget('setting_' . $key);
            }

            Cache::forever('setting_' . $key, $request->get($key));
        }

        Session::flash('success', "Settings have been updated successfully.");
        return redirect()->back();
    }
}
