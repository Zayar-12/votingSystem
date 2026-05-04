@extends('layouts.app')
@section('title', 'Register - Voting System')
@section('content')
    <h2>Register</h2>
@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
    <script>
        window.onload = function() {
            const message = document.getElementById('success-message');
            if (message) {
                setTimeout(function() {
                    message.style.transition = "opacity 1s ease";
                    message.style.opacity = "0";
                    setTimeout(() => message.remove(), 1000);
                }, 5000);
            }
        };
    </script>

    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
@endsection