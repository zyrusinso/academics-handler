<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.settings.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        if(!Auth::user()) {
            return redirect()->back();
        }

        $validated = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'profile_pic' => 'image|max:2000',
        ]);

        $user = User::find(Auth::user()->id);

        if($user){
            $user->update([
                'name' => $validated['name']
            ]);
        }

        if($request->hasFile('profile_pic')) {
           $user->clearMediaCollection('profile');
           $user->addMedia($validated['profile_pic'])->toMediaCollection('profile');
        }

        session()->flash('success', 'Profile Updated Successfully.');
        return redirect()->back();

    }

    /**
     *  Update User Password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_update(Request $request, $id) {

        if(!Auth::user()) {
            return redirect()->back();
        }

        $validated = $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::find(Auth::user()->id);

        if($user) {
            if(Hash::check($validated['current_password'], $user->password)) {
                $user->password = Hash::make($validated['password']);
                $user->save();

                session()->flash('passwordUpdated', 'Your password have been updated!');
                return redirect()->back();
            } else {
                session()->flash('passwordError', 'Your current password does not match your record.');
                return redirect()->back();
            }
        }

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
