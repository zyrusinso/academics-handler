<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all(); 
        return view('dashboard.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.about.create');
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
            "certification" => ['required'],
            "life_programs" => ['required'],
            "social" => ['required'],
            "affordability" => ['required'],
            "education_services" => ['required'],
            "education_services_link" => ['required'],
            "success_rate" => ['required'],
            "success_rate_link" => ['required'],
            "foreign_student" => ['required'],
            "foreign_student_link" => ['required'],
            "tour_description" => ['required'],
            'tour_title' => ['required'],
            "tour_link" => ['required'],
            'list_one' =>['required'],
            'list_two' =>['required'],
            'list_three' =>['required'],
            'tour_image' => ['required', 'image'],
            "started_title" => ['required'],
            "started_description" => ['required'],
        ]);

        if($request->hasFile('tour_image')){
            $imagePath = request('tour_image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(601, 650);
            $image->save();
        }

        About::create([
            'certificate' => $validated['certification'],
            'life_program' => $validated['life_programs'],
            'affordability' => $validated['affordability'],
            'social' => $validated['social'],
            'education_services' => $validated['education_services'],
            'education_services_link' => $validated['education_services_link'],
            'success_rate' => $validated['success_rate'],
            'success_rate_link' => $validated['success_rate_link'],
            'foreign_student' => $validated['foreign_student'],
            'foreign_student_link' => $validated['foreign_student_link'],  
            'tour_title' => $validated['tour_title'],
            'tour_description' => $validated['tour_description'],
            'list_one' => $validated['list_one'],
            'list_two' => $validated['list_two'],
            'list_three' => $validated['list_three'],
            'tour_image' => $imagePath,
            'tour_link' => $validated['tour_link'],
            'started_title' => $validated['started_title'],
            'started_description' => $validated['started_description']
        ]);

        return redirect(route('home.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        return view('dashboard.about.show');
    }

   
    public function update(Request $request, About $about, $id)
    {
        $aboutData = About::where('id',$id);
        $validated = $request->validate([
            "certification" => ['required'],
            "life_programs" => ['required'],
            "social" => ['required'],
            "affordability" => ['required'],
            "education_services" => ['required'],
            "education_services_link" => ['required'],
            "success_rate" => ['required'],
            "success_rate_link" => ['required'],
            "foreign_student" => ['required'],
            "foreign_student_link" => ['required'],
            "tour_description" => ['required'],
            'tour_title' => ['required'],
            "tour_link" => ['required'],
            'list_one' =>['required'],
            'list_two' =>['required'],
            'list_three' =>['required'],
            'tour_image' => ['image'],
            "started_title" => ['required'],
            "started_description" => ['required'],
        ]);

        if($request->hasFile('tour_image')){
            $imagePath = request('tour_image')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(601, 650);
            $image->save();
        }

        $aboutData->update([
            'certificate' => $validated['certification'],
            'life_program' => $validated['life_programs'],
            'affordability' => $validated['affordability'],
            'social' => $validated['social'],
            'education_services' => $validated['education_services'],
            'education_services_link' => $validated['education_services_link'],
            'success_rate' => $validated['success_rate'],
            'success_rate_link' => $validated['success_rate_link'],
            'foreign_student' => $validated['foreign_student'],
            'foreign_student_link' => $validated['foreign_student_link'],  
            'tour_title' => $validated['tour_title'],
            'tour_description' => $validated['tour_description'],
            'list_one' => $validated['list_one'],
            'list_two' => $validated['list_two'],
            'list_three' => $validated['list_three'],
            'tour_image' => ($request->hasFile('tour_image')? $imagePath : $aboutData->tour_image),
            'tour_link' => $validated['tour_link'],
            'started_title' => $validated['started_title'],
            'started_description' => $validated['started_description']
        ]);

        return redirect(route('abput.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        
    }
}
