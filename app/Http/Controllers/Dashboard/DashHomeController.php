<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DashHome;
use Intervention\Image\Facades\Image;


class DashHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homes = DashHome::all();
        return view('dashboard.home.index', compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.home.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'image' => ['required', 'image'],
            'description' => ['required'],
            'url' => ['required'],
            'video_link' => ['required'],
            'contact_num' => ['required'],
            'contact_email' => ['required']
        ]);

        if($request->hasFile('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(storage_path("app/public/{$imagePath}"))->resize(61, 61);
            $image->save();
        }

        DashHome::create([
            'title' => $validated['title'],
            'image' => ($request->hasFile('image')? $imagePath : NULL),
            'description' => $validated['description'],
            'url' => $validated['url'],
            'video_link' => $validated['video_link'],
            'contact_num' => $validated['contact_num'],
            'contact_email' => $validated['contact_email'],
        ]);

        return redirect(route('home.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $home = DashHome::where('id', $id)->first();
        return view('dashboard.home.show', compact('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $home = DashHome::where('id', $id)->first();
        
        $validated = $request->validate([
            'title' => ['required'],
            'image' => [ 'image'],
            'description' => ['required'],
            'url' => ['required'],
            'video_link' => ['required'],
            'contact_num' => ['required'],
            'contact_email' => ['required']
        ]);

        if($request->hasFile('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $image = Image::make(storage_path("app/public/{$imagePath}"))->resize(61, 61);
            $image->save();
        }

        $home->update([
            'title' => $validated['title'],
            'image' => ($request->hasFile('image')? $imagePath : $home->image),
            'description' => $validated['description'],
            'url' => $validated['url'],
            'video_link' => $validated['video_link'],
            'contact_num' => $validated['contact_num'],
            'contact_email' => $validated['contact_email'],
        ]);

        return redirect(route('home.show', $id));
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
