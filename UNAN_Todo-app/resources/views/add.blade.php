@extends('layouts/layout')

@section('title')
Add
@endsection

@section('content')
<div class='page-title'>
	<div class="to-back">
		<a href="/"><x-heroicon-o-arrow-left class="icon-style" /></a>
		<h1>Add a new todo</h1>
	</div>
</div>
<form id="addTodo" class="form-todo">
	@csrf
	<div class="form-row">
		<div class="form-column">
			<label for="tname">Name of todo</label>
			<input type="text" id="tname" name="name" placeholder="Go to market" required>
		</div>
	</div>
	<div class="form-row">
		<div class="form-column">
			<label for="tdate_f">Date to end a todo</label>
			<input type="date" id="tdate_f" name="date_f" placeholder="Go to market" required>
		</div>
		<div class="form-column">
			<label for="tstatus">Status</label>
			<select id="tstatus" name="status" required>
  				<option value="not started" selected>Not started</option>
  				<option value="in progress">In progress</option>
  				<option value="pending">Pending</option>
  				<option value="done">Done</option>
			</select>
		</div>
		<div class="form-column">
			<label for="tpriority">Priority</label>
			<select id="tpriority" name="tpriority" required>
  				<option value="todo" selected>Todo</option>
  				<option value="low">Low</option>
  				<option value="medium">Medium</option>
  				<option value="high">High</option>
			</select>
		</div>
	</div>
	<button type="submit">Send</button>
</form>
<script src="{{ asset('js/create.js') }}"></script>
@endsection
