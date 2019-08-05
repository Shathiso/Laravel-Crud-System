<?php

namespace App\Http\Controllers;
use App\User;
use App\Profile;
use \Input as Input;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function create(){
      return view('/profiles.create');
    }

    public function index(Profile $profile) {
        if(auth()->id() == 3){
          $profile = Profile::all();
          return view('/profiles.index', compact('profile'));
        }
        else{
          //$this->authorize('update', $profile); //update method is found in the App\Policies\ProfilePolicy
             // abort_if($profile->owner_id !==  auth()->id(), 403);
             $profile = Profile::where('owner_id', auth()->id())->get();
             return view('profiles.show', compact('profile'));
          }
        
      }

    public function show(User $user, Profile $profile) {
        $profile = Profile::all();
          //abort_if($profile->user_id !==  auth()->id(), 403);
         // $profile = Profile::where('owner_id', $user->id);
           return view('profiles.show', compact('profile'));
        }

        public function edit(Profile $profile) {
          return view('profiles.edit', compact('profile'));
        }

        public function update(Profile $profile, Request $request) {
          if(request('image') !== null){
           $imagePath = request('image')->store('images/profile-images', 'public');
          }
          // Dont forget to run [ php artisan storage:link ]
         $attributes = request()->validate([
          'motto' => ['required', 'min:3'],
          'address' => ['required', 'min:3'],
          'city' => ['required', 'min:3'],
          'country' => ['required', 'min:3'],
        ]);
        $attributes['owner_id'] = auth()->id();

         //Image resizing/Fitting
         $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
         $image->save();

        if(request('image') !== null){
          $attributes['profile_image_url'] = $imagePath;
        }
        $profile->update($attributes);

        
        session()->flash('msgTag', 'info');
        session()->flash('msg', 'Profile Updated');
   
        return redirect('/profile');
        }

      // Store Method
        public function store( Request $request) {
          $attributes = request()->validate([
            'motto' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'city' => ['required', 'min:3'],
            'country' => ['required', 'min:3']
          ]);

          if(request('image') != null){
          $this->validate($request, ['image'  => 'required|image|mimes:jpg,png,gif,jpeg|max:2048']);
          $imagePath = request('image')->store('images/profile-images', 'public');
  

          //Image resizing/Fitting
          $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
          $image->save();

          $attributes['profile_image_url'] = $imagePath;
          }
          else{

            //Adding A default Image
            $attributes['profile_image_url'] = '/images/profile-images/Placeholder.gif';
          }

          $attributes['owner_id'] = auth()->id();
          Profile::create($attributes);
  
        session()->flash('msgTag', 'info');
        session()->flash('msg', 'Profile Created');
        
        return redirect('/profile');
      }
}
