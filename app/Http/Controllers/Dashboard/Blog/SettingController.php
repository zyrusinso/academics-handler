<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blogSetting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(blogSetting::first()){
            $setting = blogSetting::first();
        }else{
            blogSetting::create([
                'comment_auto' => 0,
                'user_auto' => 0,
                'recent_limit' => 5, 
                'popular_limit' => 5,
                'recent_comment_limit' => 5, 
            ]);
            $setting = blogSetting::first();
        }
        
        return view('dashboard.blog.setting', compact('setting'));
    }
    
    public function store(Request $request)
    {
        $setting = blogSetting::first();

        $setting->update([
            'comment_auto' => ($request->comment_auto)? $request->comment_auto : 0,
            'user_auto' => ($request->user_auto)? $request->user_auto: 0,
            'recent_limit' => ($request->recent_list)? $request->recent_list : 5,
            'popular_limit' => ($request->popular_limit)? $request->popular_limit : 5,
            'recent_comment_limit' => ($request->recent_comment_limit)? $request->recent_comment_limit : 5,
        ]);

        return redirect(route('blog.settings', compact('setting')))->with(['success' => 'Data is Saved!']);
    }
}
