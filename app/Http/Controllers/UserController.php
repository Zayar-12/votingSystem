<?php

namespace App\Http\Controllers;

use App\Models\settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profilePhotoUpload(Request $request){
          $request->validate([
            'profile'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
          ]);

          if($request->hasFile('profile')){
            $image=$request->file('profile');
            $imgName=time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$imgName);
            $user=User::find(Auth::user()->id);
            $user->imgpath='images/'.$imgName;
            $user->save();
            return back()->with('success', 'Image uploaded successfully!');
          }
    }

    public function index(){
      $status=settings::where('key','status')->first();

      if(!$status || $status->value =='close'){
        return view('components.votingclose');
      }

      return view('welcome');
    }
}
