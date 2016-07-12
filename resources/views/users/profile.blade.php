@extends('template.layout')

@section('content')
	<div class="profile-center">
		<div class="col-lg-6 col-sm-6">
		    <div class="card hovercard">
		        <div class="card-background">
		            <img class="card-bkimg" alt="" src="img/blur.jpg">
		            <!-- http://lorempixel.com/850/280/people/9/ -->
		        </div>
		        <div class="useravatar">
		            <img alt="" src="{{$user->img}}">
		        </div>
		        <div class="card-info"> <span class="card-title">{{$user->name}}</span>

		        </div>
		    </div>
		    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
		        <div class="btn-group" role="group">
		            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
		                <div class="hidden-xs">Info</div>
		            </button>
		        </div>
		        <div class="btn-group" role="group">
		            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
		                <div class="hidden-xs">Favorites</div>
		            </button>
		        </div>
		        <div class="btn-group" role="group">
		            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		                <div class="hidden-xs">My books</div>
		            </button>
		        </div>
		    </div>

		        <div class="well">
		      <div class="tab-content">
		        <div class="tab-pane fade in active" id="tab1">
		          <p>Email: {{$user->email}}</p>
		          <p>Books: 5</p>
		          <button class="btn btn-primary">Edit</button>

		        </div>
		        <div class="tab-pane fade in" id="tab2">
		          <h3>This is tab 2</h3>
		        </div>
		        <div class="tab-pane fade in" id="tab3">
		          <div class="ui relaxed divided list">
		          @foreach ($user->book as $book)
		            <div class="item">
		              <i class="large book middle aligned icon"></i>
		              <div class="content">
		                <a class="header" href="{{ route('books.show', $book->id) }}">{{$book->title}}</a>
		                <div class="description">Created at {{$book->created_at}}</div>
		              </div>
		            </div>
		           @endforeach
		          </div>
		        </div>
		      </div>
		    </div>
		    
		    </div>
	</div>	
@stop

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {
		$(".btn-pref .btn").click(function () {
		    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
		    // $(".tab").addClass("active"); // instead of this do the below 
		    $(this).removeClass("btn-default").addClass("btn-primary");   
		});

		$('#main').removeClass('principal-content');
		});
	</script>
@stop