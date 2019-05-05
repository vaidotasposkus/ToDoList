@extends('todolist::app')
@section('content')
	@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif
	@if(isset($task))
		<h3>{{ __('todolist::todo.text.edit') }}</h3>
		{!! Form::model($task, ['route' => ['todo.update', $task->id], 'method' => 'patch']) !!}
	@else
		<h3>{{ __('todolist::todo.text.add') }}</h3>
		{!! Form::open(['route' => 'todo.store']) !!}
	@endif
	<div class="form-inline">
		<div class="form-group">
			{!! Form::text('name',null,[
				'class' => 'form-control',
				'placeholder' => __('todolist::todo.form.placeholder'),
				'required'
			]) !!}
		</div>
		<div class="form-group">
			{!! Form::submit($submit, [
				'class' => 'btn btn-outline-primary form-control' ,
				'title' => $buttonTitle,
				'data-toggle' => 'tooltip',
				'data-placement' => 'bottom',
			]) !!}
		</div>
	</div>
	@if($errors->has('name'))
		<div class="alert alert-danger mt-2">
			{{ $errors->first('name') }}
		</div>
	@endif
	{!! Form::close() !!}
	<br />
	<hr>
	<br />
	<h2>{{ __('todolist::todo.todoTable.title') }}</h2>
	<table class="table table-bordered table-striped">
		<thead>
		<tr>
			<th scope="col">{{ __('todolist::todo.todoTable.header.id') }}</th>
			<th scope="col">{{ __('todolist::todo.todoTable.header.name') }}</th>
			<th scope="col">{{ __('todolist::todo.todoTable.header.action') }}</th>
		</tr>
		</thead>
		<tbody>
		@foreach($tasks as $task)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $task->name }}</td>
				<td>
					{!! Form::open(['route' => ['todo.destroy', $task->id], 'method' => 'delete']) !!}
						<div class='btn-group'>
							<a data-toggle="tooltip" data-placement="bottom" title="{{ __('todolist::todo.todoTable.buttons.edit') }}" href="{!! route('todo.edit', [$task->id]) !!}" class='btn btn-outline-primary mr-2'><i class="fas fa-edit"></i></a>
							{!! Form::button('<i class="fas fa-trash-alt"></i>', [
								'type' => 'submit',
								'class' => 'btn btn-outline-danger',
								'title' => __('todolist::todo.todoTable.buttons.delete'),
								'data-toggle' => 'tooltip',
								'data-placement' => 'bottom',
								'onclick' => "return confirm('". __('todolist::todo.todoTable.deleteException') ."')"
							]) !!}
						</div>
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endsection
@section('javascript')
	<script type="application/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
	</script>
@endsection