<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Package;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Event;
use App\Models\DashHome;
use App\Models\About;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        $homes = DashHome::all();
        $posts =  DB::table('posts')
                    ->join('categories', 'posts.cat_id', '=', 'categories.id')
                    ->join('users', 'posts.user_id', '=', 'users.id')
                    ->select('categories.*', 'categories.id as category_id', 'users.*', 'users.id as users_id','posts.*')
                    ->orderBy('posts.id', 'desc')
                    ->get();
        // dd($posts);
        $events = Event::orderBy('id', 'desc')->take(3)->get();
        $essays = Services::where('service_category', '=', 'Essay Services')->get();
        $dissertations = Services::where('service_category', '=', 'Dissertation Services')->get();
        $others = Services::where('service_category', '=', 'Other Services')->get();
        $packages = Package::all()->take(6);
        $feedbacks = Feedback::all();
        return view('welcome', compact('essays','dissertations','others', 'packages', 'feedbacks', 'posts', 'events', 'homes'));
    }

    public function index()
    {
        return view('home');
    }

    /**
     * Show the application services.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function services() {
        $essays = Services::where('service_category', '=', 'Essay Services')->get();
        $dissertations = Services::where('service_category', '=', 'Dissertation Services')->get();
        $others = Services::where('service_category', '=', 'Other Services')->get();
        return view('services', compact('essays','dissertations','others'));
    }

    /**
     * Show the application about.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function about() {
        $about = About::first();
        return view('about', compact('about'));
    }

    public function package(){
        $packages = Package::all();
        return view('package', compact('packages'));
    }

    //FeedBack
    public function feedbackStore(Request $request){
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(70, 70);
        $image->save();

        Feedback::create([
            'name' => $request->name,
            'feedback' => $request->feedback,
            'image' => $imagePath
        ]);

        return redirect(route('welcome'));
    }

    public function blog() {

        $posts =  DB::table('posts')
        ->join('categories', 'posts.cat_id', '=', 'categories.id')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('categories.*', 'categories.id as category_id', 'users.*', 'users.id as users_id','posts.*')
        ->orderBy('posts.id', 'desc')
        ->paginate(3);
        

        return view('blog', compact('posts'));
    }

    public function blogSearch(Request $request){
        $q = $request->q;
        $posts =  DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('users.*', 'users.id as users_id','posts.*')
            ->where('posts.title', 'like', '%'.$q.'%')
            ->orderBy('posts.id', 'desc')
            ->paginate(3);
        session()->put('success', 'Success!');
        return view('blog', compact('posts', 'q'));
    }

    public function blogShow($id){
        
        $post =  DB::table('posts')
                    ->where('posts.id',$id)
                    ->join('categories', 'posts.cat_id', '=', 'categories.id')
                    ->join('users', 'posts.user_id', '=', 'users.id')
                    ->select('categories.*', 'categories.id as category_id', 'users.*', 'users.id as users_id','posts.*')
                    ->first();

        $related = Post::where('cat_id', $post->category_id)->where('posts.id', '!=', $post->id)->get();
        $comments = DB::table('comments')
                    ->join('users', 'comments.user_id', '=', 'users.id')
                    ->join('posts', 'comments.post_id', '=', 'posts.id')
                    ->select('users.*', 'users.id as userId', 'posts.*', 'posts.id as postId', 'comments.*')
                    ->get();
        return view('blogShow', compact('post', 'related', 'comments'));
    }

    public function blogCategory($id){
        $posts =  DB::table('posts')
            ->join('categories', 'posts.cat_id', '=', 'categories.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('categories.*', 'categories.id as category_id', 'users.*', 'users.id as users_id','posts.*')
            ->where('cat_id', "=",$id)
            ->orderBy('posts.id', 'desc')
            ->paginate(3);
            

        return view('blog', compact('posts'));

    }

    public function blogAddComment(Request $request, $id){

        $validated = $request->validate([
            'comment' => ['required']
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $id,
            'comment' => $validated['comment'],
        ]);
        
        return redirect(route('blog.comment.add', $id));
    }
}