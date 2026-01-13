<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // filter by type (optional)
        $type = $request->type;

        $query = Car::latest();

        if($type && in_array($type, ['most_searched','latest'])){
            $query->where('type', $type);
        }

        $cars = $query->paginate(10)->withQueryString();

        return view('admin.cars.index', compact('cars','type'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'brand' => 'nullable|string|max:120',
            'price' => 'nullable|numeric|min:0',
            'type' => 'required|in:most_searched,latest',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable',
        ]);

        $imagePath = $request->file('image')->store('cars','public');

        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $imagePath,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('cars.index')->with('success','Car Added Successfully!');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'brand' => 'nullable|string|max:120',
            'price' => 'nullable|numeric|min:0',
            'type' => 'required|in:most_searched,latest',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable',
        ]);

        $data = $request->only(['name','brand','price','type']);
        $data['status'] = $request->status ? 1 : 0;

        // Replace image
        if($request->hasFile('image')){
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }
            $data['image'] = $request->file('image')->store('cars','public');
        }

        $car->update($data);

        return redirect()->route('cars.index')->with('success','Car Updated Successfully!');
    }

    public function destroy(Car $car)
    {
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->back()->with('success','Car Deleted Successfully!');
    }
}
