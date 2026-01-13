<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Car;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'setting' => SiteSetting::first(),
            'banners' => Banner::where('status', 1)->latest()->get(),
            'mostSearchedCars' => Car::where('type', 'most_searched')->where('status', 1)->latest()->take(8)->get(),
            'latestCars' => Car::where('type', 'latest')->where('status', 1)->latest()->take(8)->get(),
        ]);
    }
}
