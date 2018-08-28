@extends('layouts.app')

@section('content')
<div class="container">    

    <h1>All the Students</h1>

    <nav class="navbar navbar-inverse">        
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('student') }}">View All Students</a></li>
            <li><a href="{{ URL::to('student/create') }}">Create a Student</a>
        </ul>
    </nav>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>FullName</td>
                <td>Email</td>
                <td>Date of birth</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->fullname }}</td>
                <td>{{ $value->user->email }}</td>
                <td>{{ $value->dateofbirth }}</td>
                <td>
                    {{ Form::open(array('url' => 'student/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this Student', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
                    <a class="btn btn-small btn-success" href="{{ URL::to('student/' . $value->id) }}">Show this Nerd</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('student/' . $value->id . '/edit') }}">Edit this Nerd</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection