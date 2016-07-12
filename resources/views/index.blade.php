@extends('template.layout')

@section('content')

	<div class="ui grid container">

	@foreach($books as $book)
	 <div class="four wide column stackable">
	 	<div class="ui special cards">
	 	  <div class="yellow card">
	 	    <div class="blurring dimmable image">
	 	      <div class="ui dimmer">

	 	        <div class="content">
	 	          <div class="center">
	 	            <a href="{{route('books.show', $book->id)}}"><div class="ui inverted button">+info</div></a>
	 	          </div>
	 	        </div>

	 	      </div>
	 	      <img src="{{$book->img}}">
	 	    </div>
	 	    <div class="content">
		 	  <i class="right floated star icon"></i>
	 	      <a class="header">{{$book->title}}</a>
	 	      <div class="meta">
	 	        <span class="date">{{$book->genre}}</span>
	 	        <span class="date"><i>{{$book->author}}</i></span>
	 	      </div>
	 	    </div>
	 	    <div class="extra content">
	 	      <div class="author" align="center">
	 	            <img class="ui avatar image" src="{{$book->img}}"> {{$book->user->name}}
	 	          </div>
	 	    </div>

	 	  </div>
	 	</div>
	 </div>
	@endforeach
	</div><br>
	
	<center>{{$books->render()}}</center>
	
@stop

@section('js')
	<script type="text/javascript">
		$('.special.cards .image').dimmer({
		  on: 'hover'
		});
	</script>
@stop

