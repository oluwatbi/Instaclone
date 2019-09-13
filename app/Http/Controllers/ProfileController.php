<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember('count.post.'. $user->id, now()->addSeconds(20),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember('count.followers'. $user->id, now()->addSeconds(20),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember('count.following'. $user->id, now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });
        return view('index', compact('user','follows', 'postCount', 'followersCount', 'followingCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Profile $profile
     * @return void
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if (request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/$imagePath"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Profile $profile
     * @return void
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
