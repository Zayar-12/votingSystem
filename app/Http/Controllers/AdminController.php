<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\settings;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function toggleStartStop(){
        $status=settings::firstOrCreate(

        ['key'=>'status'],
        ['value'=>'close']
        );

        if($status->value=='close'){
            $status->value='open';
        }else{
            $status->value='close';
        }

        $status->save();

        return back()->with('success', 'Voting status updated successfully!');
    }

    public function index(){
        $status=settings::where('key','status')->first();
        $topCandidates=Candidate::withCount('users')->orderBy('users_count','desc')->take(3)->get();

       $is_voting_open=($status && $status->value == 'open');
          
       return view('admin.home',['is_voting_open'=>$is_voting_open,'topCandidates'=>$topCandidates]);

    
    }
}
