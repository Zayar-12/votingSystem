@extends('layouts.app')

@section('title', 'Home - Voting System')

@section('content')
   <div>
    <h1>Home page</h1>
    
  @if (session('success'))
    <div id="success-message" style="background-color: #d4edda; color: #155724; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

    {{-- <div>
       @foreach ($candidates as $candidate)
       <a href="{{route('candidate.show',$candidate)}}">
         <div>
            <h1>Name:{{$candidate->name}}</h1>
        <p>Age:{{$candidate->age}}</p>
       
         </div>
       </a>
        
  <hr>
    @endforeach
   </div> --}}
   <livewire:candidate-search/>
 
   </div>
@endsection