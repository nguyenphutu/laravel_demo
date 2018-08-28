@extends('layouts.app')
@section('content')
<div class="container">    
<h1>Showing {{ $teacher->fullname }}</h1>
<nav class="navbar navbar-inverse">        
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('teacher') }}">View All Teacher</a></li>
        <li><a href="{{ URL::to('teacher/create') }}">Create a Teacher</a>
    </ul>
</nav>

    <div class="jumbotron text-center">
        <h2>{{ $teacher->fullname }}</h2>
        <p>
            <strong>Email:</strong> {{ $teacher->user->email }}<br>
            <strong>Date of Birth:</strong> {{ $teacher->dateofbirth }}<br>
            <strong>Position:</strong> {{ $teacher->position }}
        </p>
    </div>

</div>

@endsection
