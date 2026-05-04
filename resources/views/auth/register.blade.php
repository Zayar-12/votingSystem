@extends('layouts.app')
@section('title', 'Register - Voting System')
@section('content')
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label>Full Name:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Create Account</button>
        </div>
    </form>

    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
@endsection