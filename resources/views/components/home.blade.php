@extends('layouts.app')

@section('title', 'Home - Voting System')

@section('content')
   <div>
    <h1>Home page</h1>
    
  
    <div>
       @foreach ($candidates as $candidate)
       <a href="{{route('candidate.show',$candidate)}}">
         <div>
            <h1>Name:{{$candidate->name}}</h1>
        <p>Age:{{$candidate->age}}</p>
         <p>Age:{{$candidate->height}}</p>
          <p>Age:{{$candidate->hobby}}</p>
          <p>Age:{{$candidate->nation}}</p>
            <p>Age:{{$candidate->bio}}</p>   
         </div>
       </a>
        
  <hr>
    @endforeach
   </div>
 
   </div>
@endsection