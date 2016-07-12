@extends('template.layout')


@section('content')
<h2>Avaible roles</h2>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Create new role</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(array('route' => 'admin.roles.store', 'method' => 'POST', 'class' => 'ui form')) !!}
				<div class="form-group">
					{!! Form::label('name', null, ['class' => '']) !!}
					{!! Form::text('name', null , ['class' => 'ui input', 'placeholder' => 'Roles name'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('display_name', null, ['class' => '']) !!}
					{!! Form::text('display_name', null , ['class' => 'ui input', 'placeholder' => 'Display name'])!!}
				</div>
				<div class="form-group">
					{!! Form::label('description', null, ['class' => '']) !!}
					{!! Form::text('description', null , ['class' => 'ui input', 'placeholder' => 'Description'])!!}
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
<div class="ui buttons">
  <button class="ui red basic button" data-toggle="modal" data-target="#myModal">New role</button>
  <button class="ui blue basic button">New permission</button>
</div>
<table class="ui celled striped table">
	<thead>
		<tr><th colspan="3">
		Roles
		</th>
	</tr></thead>
	<tbody>
		@foreach($roles as $role)
		<tr>
			<td class="collapsing">
				<i class="user icon"></i><a href={{ route('admin.roles.show', $role->id) }}> {{$role->display_name}}</a>
			</td>
			<td>{{$role->description}}</td>
			<td class="right aligned collapsing">{{$role->name}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop

@section('js')
<script type="text/javascript">
	$( document ).ready(function() {
		$('.modal-btn').click(function(){
			$('.ui.modal')
			.modal('show')
			;
		})
	});
</script>
@stop