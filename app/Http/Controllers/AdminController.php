<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\settings;
use App\Models\User;
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

    public function detail(Candidate $candidate){
        return view('admin.components.candidateDetail',['candidate'=>$candidate]);
    }


    public function store(Request $request)
{
  
    $validatedData = $request->validate([
        'name'      => 'required|string|max:255',
        'age'       => 'required|integer|min:15|max:100',
        'nation'    => 'required|string|max:100',
        'height'    => 'required|string|max:50',
        'hobby'     => 'nullable|string|max:255',
        'bio'       => 'nullable|string',
        'imagepath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    
    if ($request->hasFile('imagepath')) {
        $img = $request->file('imagepath');
        $imgName = time() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('candidates'), $imgName);
        
     
        $validatedData['imagepath'] = 'candidates/' . $imgName;
    } else {
      
        $validatedData['imagepath'] = 'candidates/default.jpg';
    }

  
    Candidate::create($validatedData);

    return redirect()->route('admin.home')->with('success', 'New candidate added successfully!');
}



    public function update(Request $request, Candidate $candidate) {
    $validatedData = $request->validate([
        'name'      => 'required|string|max:255',
        'age'       => 'required|integer|min:15|max:100',
        'nation'    => 'required|string|max:100',
        'height'    => 'required|string|max:50',
        'hobby'     => 'nullable|string|max:255',
        'bio'       => 'nullable|string',
        'imagepath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    if($request->hasFile('imagepath')) {
       
        if($candidate->imagepath && file_exists(public_path($candidate->imagepath))) {
            
            if (!str_contains($candidate->imagepath, 'default.jpg')) {
                unlink(public_path($candidate->imagepath));
            }
        }

   
        $img = $request->file('imagepath');
        $imgName = time() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('candidates'), $imgName);

     
        $validatedData['imagepath'] = 'candidates/' . $imgName;
    }

    $candidate->update($validatedData);
    return redirect()->route('admin.home')->with('success', 'Candidate updated successfully!');
}

public function destroy(Candidate $candidate){
    $candidate->delete();
 return redirect()->route('admin.home')->with('success', 'Candidate deleted successfully!');
}


public function voterList(){
    return view('admin.components.voterList');
}


public function candidateList(){
    return view('admin.components.candidateList');
}

public function voteHistory(){
    return view('admin.components.votingHistory');
}

}