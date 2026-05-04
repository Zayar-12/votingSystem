<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(){
        $candidates=Candidate::all();
        return view('components.home',['candidates'=>$candidates]);
    }

    public function show(Candidate $candidate){
        return view  ('components.showCandidate',['candidate'=>$candidate]);
    }

    public function vote(){
        dd('test');
    }
}
