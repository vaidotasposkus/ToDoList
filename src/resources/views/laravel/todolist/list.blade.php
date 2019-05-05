@extends('todolist::app')
@section('content')
	@if(isset($task))
		<h3>{{ __('todolist::todo.text.edit') }}</h3>
		{!! Form::model($task, ['route' => ['todo.update', $task->id], 'method' => 'patch']) !!}
	@else
		<h3>{{ __('todolist::todo.text.add') }}</h3>
		{!! Form::open(['route' => 'todo.store']) !!}
	@endif
	<div class="form-inline">
		<div class="form-group">
			{!! Form::text('name',null,['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit($submit, ['class' => 'btn btn-primary form-control']) !!}
		</div>
	</div>
	{!! Form::close() !!}
	<hr>
	<h4>Tasks To Do : </h4>
	<table class="table table-bordered table-striped">
		<thead>
		<tr>
			<th>Name</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		@foreach($tasks as $task)
			<tr>
				<td>{{ $task->name }}</td>
				<td>
					{!! Form::open(['route' => ['todo.destroy', $task->id], 'method' => 'delete']) !!}
					<div class='btn-group'>
						<a href="{!! route('todo.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
						{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
					</div>
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection