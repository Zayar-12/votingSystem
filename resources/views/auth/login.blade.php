@extends('layouts.app')
@section('title', 'Login - Voting System')
@section('content')
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

      

        <div>
            <button type="submit">Sign In</button>
        </div>
    </form>
    
    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
@endsection