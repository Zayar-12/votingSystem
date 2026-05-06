@extends('layouts.app')

@section('title', 'Home - Voting System')

@section('content')
   <div>
    <h1>Welcome page</h1>
  <a href="{{ route('home') }}" class="underline text-blue-600 text-2xl">get started</a>
   </div>
   
@endsection