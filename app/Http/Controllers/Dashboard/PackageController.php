<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;


class PackageController extends Controller

{
    
    public function index()
    {
        $packages = Package::all();
        return view('dashboard.package.index', compact('packages'));
    }


    public function create()
    {
        return view('dashboard.package.create');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => ['required', 'min:5'],
            'category' => ['required', 'min:5'],
            'price' => ['required', 'min:1'],
            'image' => ['required', 'image'],
            'avatar' => ['required', 'image'],
            'sub_price' => ['required', 'min:1'],
            'rate' => ['required', 'min:1'],
            'num_rate' => ['required', 'min:1'],
        ]);

        $avatarPath = request('avatar')->store('avatar', 'public');
        $avatarImage = Image::make(public_path("storage/{$avatarPath}"))->resize(61, 61);
        $avatarImage->save();

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(370, 450);
        $image->save();

        Package::create([
            'title' => $data['title'],
            'category' => $data['category'],
            'price' => $data['price'],
            'image' => $imagePath,
            'avatar' => $avatarPath,
            'sub_price' => $data['sub_price'],
            'rate' => $data['rate'],
            'num_rate' => $data['num_rate'],
        ]);

        return redirect(route('dashboard.package'));
    }

    public function show(Package $package, $id)
    {
        $package = Package::where('id',$id)->first();
        return view('dashboard.package.show', compact('package'));
    }


    public function edit(Package $package)
    {
        //
    }

    public function update(Request $request, Package $package, $id)
    {
        $package = Package::where('id',$id)->first();

        $validated = request()->validate([
            'title' => ['required', 'min:5'],
            'category' => ['required', 'min:5'],
            'price' => ['required', 'min:1'],
            'image' => ['image'],
            'avatar' => ['image'],
            'sub_price' => ['required', 'min:1'],
            'rate' => ['required', 'min:1'],
            'num_rate' => ['required', 'min:1'],
        ]);

        if($request->hasFile('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(370, 450);
            $image->save();
        }

        if($request->hasFile('avatar')){
            $avatarPath = request('avatar')->store('avatar', 'public');
            $avatarImage = Image::make(public_path("storage/{$avatarPath}"))->resize(61, 61);
            $avatarImage->save();
        }

        $create = [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'image' => ($request->hasFile('image')? $imagePath : $package->image),
            'avatar' => ($request->hasFile('avatar')? $avatarPath : $package->avatar),
            'sub_price' => $validated['sub_price'],
            'rate' => $validated['rate'],
            'num_rate' => $validated['num_rate'],
        ];

        $package->update($create);

        return redirect()->back();
    }

    public function destroy(Package $package)
    {
        
    }
}
