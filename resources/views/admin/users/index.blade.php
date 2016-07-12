@extends('template.layout')

@section('content')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Create new user</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(array('route' => 'admin.users.store', 'method' => 'POST', 'class' => 'ui form')) !!}
				<div class="form-group">
					{!! Form::label('name', null, ['class' => '']) !!}
					{!! Form::text('name', null , ['class' => 'ui input', 'placeholder' => 'Your name'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('email', null, ['class' => '']) !!}
					{!! Form::text('email', null , ['class' => 'ui input', 'placeholder' => 'example@example.com'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('password', null, ['class' => '']) !!}
					{!! Form::password('password', ['class' => 'ui input', 'placeholder' => '*********'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('role', null, ['class' => '']) !!}
					{!! Form::select('role', $roles ) !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>

				


				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>



<center>
	<button class="ui button" data-toggle="modal" data-target="#myModal">Add new user</button>
	<button class="ui button">Follow</button>
	<hr>
	<table class="ui very basic collapsing celled table">
		<thead>
			<tr><th>Name</th>
				<th>Email</th><th>Role</th><th>Created at</th>
				<th>Manage</th>
			</tr></thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>
						<a href="{{ route('admin.users.show', $user->id) }}"><h4 class="ui image header">
							<img src="{{$user->img}}" class="ui mini rounded image">
							<div class="content">
								{{$user->name}}
							</div>
						</div>
					</h4></a>
					</td>
					<td>
						{{$user->email}}
					</td>
					<td>
						Admin
					</td>
					<td>
						{{$user->created_at}}
					</td>
					<td>
						<a href="{{ route('admin.users.edit', $user->id) }}"><button data-content="Edit user" class="circular ui icon button">
						  <i class="icon settings"></i>
						</button></a>
					</td>
				</tr>
				@endforeach
				
			</tbody>
		</table>

		{{$users->render()}}
</center>
@stop

@section('js')
	<script type="text/javascript">
		$('.circular')
		  .popup()
		;
	</script>
@stop