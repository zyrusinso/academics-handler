<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.blog.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('dashboard.blog.post.create', compact('category'));
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
            'cat_id' => ['required'],
            'title' => ['required'],
            'thumb' => ['required', 'image'],
            'full_img' => ['required', 'image'],
            'detail' => ['required'],
            'tags' => ['required']
        ]);

        if($request->hasFile('thumb')){
            $thumbPath = request('thumb')->store('thumbnails', 'public');
            $thumb = Image::make(public_path("storage/{$thumbPath}"));
            $thumb->save();
        }

        if($request->hasFile('full_img')){
            $imagePath = request('full_img')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        Post::create([
            'user_id' => auth()->user()->id,
            'cat_id' => $validated['cat_id'],
            'title' => $validated['title'],
            'thumb' => $thumbPath,
            'full_img' => $imagePath,
            'detail' => $validated['detail'],
            'tags' => $validated['tags'],
        ]);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::where('id',$id)->first();
        $category = Category::all();
        return view('dashboard.blog.post.show', compact('post', 'category'));
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
        $post = Post::where('id', $id)->first();

        $validated = $request->validate([
            'cat_id' => ['required'],
            'title' => ['required'],
            'thumb' => ['image'],
            'full_img' => ['image'],
            'detail' => ['required'],
            'tags' => ['required']
        ]);

        if($request->hasFile('thumb')){
            $thumbPath = request('thumb')->store('thumbnails', 'public');
            $thumb = Image::make(public_path("storage/{$thumbPath}"));
            $thumb->save();
        }

        if($request->hasFile('full_img')){
            $imagePath = request('full_img')->store('images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        $post->update([
            'cat_id' => $validated['cat_id'],
            'title' => $validated['title'],
            'thumb' => ($request->hasFile('thumb'))? $thumbPath : $post->thumb,
            'full_img' => ($request->hasFile('full_image'))? $imagePath : $post->full_img,
            'detail' => $validated['detail'],
            'tags' => $validated['tags'],
        ]);

        return redirect(route('post.show', $post->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id',$id)->first();
        $post->delete();

        return redirect(route('post.index'));
    }
}
