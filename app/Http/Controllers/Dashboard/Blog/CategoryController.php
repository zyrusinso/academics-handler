<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.blog.category.index', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.blog.category.create');
    }


    public function store(Request $request)
    {
        $validated = request()->validate([
            'title' => ['required'],
            'detail' => ['required'],
        ]);

        if($request->hasFile('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $imageImage = Image::make(public_path("storage/{$imagePath}"));
            $imageImage->save();
        }

        Category::create([
            'cat_title' => $validated['title'],
            'cat_detail' => $validated['detail'],
            'cat_image' => $imagePath
        ]);
        
        return redirect(route('category.index'));
    }

    
    public function show($id)
    {
        $category = Category::where('id',$id)->first();
        return view('dashboard.blog.category.show', compact('category'));
    }

    
    public function update(Request $request, $id)
    {
        $category = Category::where('id',$id)->first();

        $validated = request()->validate([
            'title' => ['required'],
            'detail' => ['required'],
        ]);

        if($request->hasFile('image')){
            $imagePath = request('image')->store('uploads', 'public');
            $Image = Image::make(public_path("storage/{$imagePath}"));
            $Image->save();
        }

        $category->update([
            'cat_title' => $validated['title'],
            'cat_detail' => $validated['detail'],
            'cat_image' => ($request->hasFile('image'))? $imagePath : $category->image
        ]);

        return redirect(route('category.show', $id));
    }

    
    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();

        return redirect(route('category.index'));
    }
}
