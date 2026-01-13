<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarInquiry;
use App\Models\SiteSetting;


class CarInquiryController extends Controller
{
    public function create()
{
    return view('car_inquiry.create', [
        'setting' => SiteSetting::first(),
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'car_options' => 'required|array|min:1',
        ], [
            'car_options.required' => 'Please select at least one car option.',
        ]);

        CarInquiry::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'car_options' => $request->car_options,
        ]);

        return redirect()->back()->with('success', 'Your response submitted successfully!');
    }
}

