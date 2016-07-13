@extends('template.layout')

 @section('content')
	<center><h2>Add book</h2></center>
	<hr>
	{!! Form::open(array('route' => 'books.store', 'method' => 'POST', 'class' => 'ui form')) !!}
		<div class="form-group">
			{!! Form::label('title', null, ['class' => '']) !!}
			{!! Form::text('title', null , ['class' => 'ui input', 'placeholder' => 'Books title'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('year', null, ['class' => '']) !!}
			{!! Form::number('year', null , ['class' => 'ui input', 'placeholder' => 'Books publication year'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('description', null, ['class' => '']) !!}
			{!! Form::textarea('description', null , ['class' => 'ui input', 'placeholder' => 'Books description'])!!}
		</div>

		<div class="form-group">
			<label>Genres</label>
			<select name="genres[]" id="genres" multiple='multiple' class="form-control">
			@foreach ($genres as $genre)
				<option value="{{$genre->id}}">{{$genre->name}}</option>
			@endforeach
			</select>

			{{-- {!! Form::select('size[]', $genres, $genres[0]->id, array('multiple')); !!} --}}
		</div>

		<div class="form-group">
			{!! Form::label('author', null, ['class' => '']) !!}
			{!! Form::text('author', null , ['class' => 'ui input', 'placeholder' => 'Books author'])!!}
		</div>
		<div class="form-group">
			<button class="ui button">
			  <i class="plus icon"></i>
			  add new book
			</button>
		</div>



		
	{!! Form::close() !!}
 @stop	
	
