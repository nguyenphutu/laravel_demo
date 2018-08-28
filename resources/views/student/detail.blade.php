@extends('layouts.app')
@section('content')
<div class="container">    
<h1>Showing {{ $student->fullname }}</h1>
<nav class="navbar navbar-inverse">        
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('student') }}">View All Student</a></li>
        <li><a href="{{ URL::to('student/create') }}">Create a Student</a>
    </ul>
</nav>

    <div class="jumbotron text-center">
        <h2>{{ $student->fullname }}</h2>
        <p>
            <strong>Email:</strong> {{ $student->user->email }}<br>
            <strong>Date of Birth:</strong> {{ $student->dateofbirth }}<br>
        </p>
    </div>

</div>

@endsection
