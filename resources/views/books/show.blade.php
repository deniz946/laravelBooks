@extends('template.layout')

@section('content')
	{{-- NAV SIDEBAR --}}

	<div class="ui sidebar inverted vertical menu">
	   <a class="item">
	     1
	   </a>
	   <a class="item">
	     2
	   </a>
	   <a class="item">
	     3
	   </a>
	 </div>
	 <div class="pusher">
	   <!-- Site content !-->
	 </div>

	{{-- <button type="button" class="btn btn-warning zzz">button</button> --}}
	{{-- END SIDEBAR --}}

	<div class="panel panel-default">
		<div class="panel-body">
			{{$book->title}}<br>
			{{$book->year}}<br>
			{{$book->description}}<br>
			{{$book->genre}}<br>
			{{$book->author}}<br>
			<img src="{{$book->img}}">
		</div>
	</div>

	

@stop

@section('js')
	<script type="text/javascript">
		$('.saltar').click(function(){
			$('.ui.modal').modal('show');
		});

		$('.zzz').click(function(){
			// $('.ui.sidebar')
			//   .sidebar('toggle')
			// ;

			$('.ui.modal')
			  .modal('show')
			;
		});




	</script>
@stop