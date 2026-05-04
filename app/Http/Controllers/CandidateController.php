<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Egulias\EmailValidator\Result\Reason\RFCWarnings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function index(){
        $candidates=Candidate::all();
        return view('components.home',['candidates'=>$candidates]);
    }

    public function show(Candidate $candidate){
        return view  ('components.showCandidate',['candidate'=>$candidate]);
    }

    public function vote(Request $request){

      $user = \App\Models\User::find(Auth::id()); //Auth::user()->id; Auth::check() ; Auth::guest();
    $candidateId=$request->input("id");
       if($user->candidates_id == $candidateId){
        return back()->with('error', 'You have already voted for this candidate!');
       };

       if($user->candidates_id != null){
        return back()->with('error', 'You have already cast your vote! You cannot vote again.');
       }

       $user->candidates_id=$candidateId;
      $user->save();
      return redirect()->route('home')->with('success', 'Your vote has been cast successfully!');
       
    }
}
