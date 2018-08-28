@extends('layouts.app')
@section('content')
<div class="container">    

<h1>Create a Nerd</h1>

<!-- if there are creation errors, they will show here -->

{{ Form::open(array('url' => '/student', 'method' => 'POST')) }}

    <div class="form-group">
        {{ Form::label('fullname', 'FullName') }}
        {{ Form::text('fullname',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email',null, array('class' => 'form-control')) }}
    </div>    
    <div class="form-group">
        <label for="position">Date of birth:</label>
        <input type='text' class="form-control" name="dateofbirth" id="dateofbirth"/>
    </div>

    {{ Form::submit('Create the Student!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
<script type="text/javascript">
    $("#dateofbirth").datepicker({
});
</script>
@endsection
