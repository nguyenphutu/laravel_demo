
@extends('layouts.app')
@section('content')
<div class="container">   
<h1>Edit {{ $student->fullname }}</h1>


{{ Form::model($student, array('route' => array('student.update', $student->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('fullname', 'FullName') }}
        {{ Form::text('fullname',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email',$student->user->email, array('class' => 'form-control')) }}
    </div>    
    <div class="form-group">
        {{ Form::label('dateofbirth', 'Date of birth') }}
        {{ Form::text('dateofbirth',$student->dateofbirth, array('class' => 'form-control', 'id'=>'dateofbirth')) }}
    </div>

    {{ Form::submit('Edit the Student!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
<script type="text/javascript">
    $("#dateofbirth").datepicker(
        'setDate', $("#dateofbirth").val(),
    );
</script>
@endsection