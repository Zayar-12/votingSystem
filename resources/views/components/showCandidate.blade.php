@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}">Back to List</a>
    
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <form action="{{route('vote')}}" method="POST">
     <div style="margin-top: 20px;">
@csrf
        <h1>Full Profile of {{ $candidate->name }}</h1>
        <p><strong>Age:</strong> {{ $candidate->age }}</p>
        <p><strong>Height:</strong> {{ $candidate->height }}</p>
        <p><strong>Hobby:</strong> {{ $candidate->hobby }}</p>
        <p><strong>Nation:</strong> {{ $candidate->nation }}</p>
        <p><strong>Bio:</strong> {{ $candidate->bio }}</p>
    </div>
    <input type="text" value="{{$candidate->id}} "  hidden name="id">
    @if ( ! Auth::user() ||Auth::user()->candidates_id==null)
        <input type="submit" value="vote">
    @else
        
        <button type="button" disabled style="background-color: grey;">You have already voted</button>
         
         
    @endif
   
</form>
@endsection