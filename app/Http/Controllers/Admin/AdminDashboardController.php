<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Car;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[
            'banners' => Banner::count(),
            'cars' => Car::count(),
            'mostSearched' => Car::where('type','most_searched')->count(),
            'latest' => Car::where('type','latest')->count(),
        ]);
    }
}

