<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(User $user)
    {  
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd($follows);
        return view('profiles.show', [
            'user' => $user,
            'follows' => $follows,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'username' => 'required',
            'bio' => 'required',
            'image' => 'image'
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();

            $imageArray = [
                'image' => $imagePath
            ];
        }

        auth()->user()->profile()->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect(route('profiles.show', auth()->user()->id));
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
