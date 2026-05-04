<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Profile</h1>
    <div class="profile-container">
    @if(Auth::user()->imgpath)
       
        <img src="{{ asset(Auth::user()->imgpath) }}" alt="Profile" style="width: 100px;">
    @else
        
        <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile" style="width: 100px;">
    @endif
    
</div>
<form action="{{route('ProfilePhoto')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="file" name="profile"><br>
        <input type="submit">
    </form>
    <p>{{ Auth::user()->name}}</p>
    <p>{{Auth::user()->email}}</p>
</body>
</html>