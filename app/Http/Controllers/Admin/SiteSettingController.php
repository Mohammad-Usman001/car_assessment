<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        // First row create if not exists
        $setting = SiteSetting::firstOrCreate([]);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::firstOrCreate([]);

        $request->validate([
            'site_name' => 'required|string|max:150',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:6048',

            'header_phone' => 'nullable|string|max:20',
            'header_email' => 'nullable|email|max:150',

            'footer_address' => 'nullable|string|max:255',
            'footer_phone' => 'nullable|string|max:20',
            'footer_email' => 'nullable|email|max:150',
            'footer_about' => 'nullable|string|max:800',
        ]);

        $data = $request->only([
            'site_name',
            'header_phone',
            'header_email',
            'footer_address',
            'footer_phone',
            'footer_email',
            'footer_about',
        ]);

        // If logo uploaded replace old
        if($request->hasFile('logo')){
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }
            $data['logo'] = $request->file('logo')->store('site', 'public');
        }

        $setting->update($data);

        return redirect()->back()->with('success','Site Settings Updated Successfully!');
    }
}
