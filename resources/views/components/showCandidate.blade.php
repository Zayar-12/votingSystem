@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}">Back to List</a>
    
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
    <input type="text" value="{{$candidate->id}}">
    <input type="submit" value="vote">
</form>
@endsection