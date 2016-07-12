@extends('template.layout')

@section('content')

	{!!Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT', 'class' => 'ui form'])!!}
	  <div class="field">
	    {!! Form::label('name', null, ['class' => '']) !!}
	    {!! Form::text('name', $user->name , ['class' => 'ui input', 'placeholder' => 'Name'])!!}
	  </div>
	  <div class="field">
	    {!! Form::label('email', null, ['class' => '']) !!}
	    {!! Form::email('email', $user->email , ['class' => 'ui input', 'placeholder' => 'Your email'])!!}
	  </div>
	  <div class="form-group">
	  	{!! Form::label('password',null, ['class' => '']) !!}
	  	{!! Form::password('password', ['class' => 'ui input', 'placeholder' => '*********'])!!}
	  </div>
	 
	  {{-- <div class="field">
	    {!! Form::label('role', null, ['class' => '']) !!}
	    {!! Form::select('role', $roles ) !!}
	  </div> --}}

	  <div class="field">
	  	<select name="role" id="input" class="form-control" required="required">
	  	<option selected="selected" value='{{$role_name[0]->id}}'>{{$role_name[0]->display_name}}</option>
	  		@foreach($roles as $role)
	  			<option value='{{$role->id}}'>{{$role->display_name}}</option>
	  		@endforeach
	  	</select>
	  </div>

	  <div class="field">
	  	{!! Form::submit('edit user', ['class'=>'ui button'])!!}
	  </div>

	{!! Form::close()!!}

	</form>
@stop