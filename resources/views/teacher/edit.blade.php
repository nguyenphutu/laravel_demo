
@extends('layouts.app')
@section('content')
<div class="container">   
<h1>Edit {{ $teacher->fullname }}</h1>


{{ Form::model($teacher, array('route' => array('teacher.update', $teacher->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('fullname', 'FullName') }}
        {{ Form::text('fullname',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email',$teacher->user->email, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        <label for="position">Select position:</label>
        <select class="form-control" id="position" name="position">
        <option value='headmaster' {{ $teacher->position === "headmaster" ? "selected" : "" }}>Head Master</option>
       
        <option value='teacher' {{ $teacher->position === "teacher" ? "selected" : "" }}>Teacher</option>
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('dateofbirth', 'Date of birth') }}
        {{ Form::text('dateofbirth',$teacher->dateofbirth, array('class' => 'form-control', 'id'=>'dateofbirth')) }}
    </div>

    {{ Form::submit('Edit the Teacher!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
<script type="text/javascript">
    $("#dateofbirth").datepicker(
        'setDate', $("#dateofbirth").val(),
    );
</script>
@endsection