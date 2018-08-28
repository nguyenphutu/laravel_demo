@extends('layouts.app')

@section('content')
<div class="container">    

    <h1>All the Teacher</h1>

    <nav class="navbar navbar-inverse">        
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('teacher') }}">View All Teacher</a></li>
            <li><a href="{{ URL::to('teacher/create') }}">Create a Teacher</a>
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
                <td>Position</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
        @foreach($teacher as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->fullname }}</td>
                <td>{{ $value->user->email }}</td>
                <td>{{ $value->position }}</td>
                <td>
                    {{ Form::open(array('url' => 'teacher/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this Teacher', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
                    <a class="btn btn-small btn-success" href="{{ URL::to('teacher/' . $value->id) }}">Show this Teacher</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('teacher/' . $value->id . '/edit') }}">Edit this Teacher</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection