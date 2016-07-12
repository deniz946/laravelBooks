@extends('template.layout')

 @section('content')
	<h2>create role</h2>
	{!! Form::open(array('route' => 'admin.roles.store', 'method' => 'POST', 'class' => 'ui form')) !!}
		{!! Form::label('name', null, ['class' => '']) !!}
		{!! Form::text('name', null , ['class' => 'ui input', 'placeholder' => 'Hola'])!!}
	{!! Form::close() !!}
 @stop	
	
