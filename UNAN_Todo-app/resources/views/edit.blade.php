@extends('layouts/layout')

@section('title')
Edit
@endsection

@section('content')
<div class='page-title'>
	<div class="to-back">
		<a href="/"><x-heroicon-o-arrow-left class="icon-style" /></a>
		<h1>Edit todo <span id="todo_id" data-id="{{ $todo->id }}" class="todo-id">{{ $todo->id }}</span></h1>
	</div>
</div>
<form id="editTodo" class="form-todo">
	@csrf
	<div class="form-row">
		<div class="form-column">
			<label for="tname">Name of todo</label>
			<input type="text" id="tname" name="name" value="{{ $todo->name }}" placeholder="Go to market" required>
		</div>
	</div>
	<div class="form-row">
		<div class="form-column">
			<label for="tdate_f">Date to end a todo</label>
			<input type="date" id="tdate_f" name="date_f" value="{{ $todo->date_f }}" placeholder="Go to market" required>
		</div>
		<div class="form-column">
			<label for="tstatus">Status</label>
			<select id="tstatus" name="status" data-status="{{ $todo->status }}" required>
  				<option value="not started">Not started</option>
  				<option value="in progress">In progress</option>
  				<option value="pending">Pending</option>
  				<option value="done">Done</option>
			</select>
		</div>
		<div class="form-column">
			<label for="tpriority">Priority</label>
			<select id="tpriority" name="tpriority" data-priority="{{ $todo->priority }}" required>
  				<option value="todo" selected>Todo</option>
  				<option value="low">Low</option>
  				<option value="medium">Medium</option>
  				<option value="high">High</option>
			</select>
		</div>
	</div>
	<button type="submit">Send</button>
</form>
<script src="{{ asset('js/edit.js') }}"></script>
@endsection
