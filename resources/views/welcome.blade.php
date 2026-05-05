@extends('layouts.app')

@section('title', 'Home - Voting System')

@section('content')
   <div>
    <h1>Welcome page</h1>
    <a href="{{route("home")}}">get started</a>
   </div>
   
@endsection