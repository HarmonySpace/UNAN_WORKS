@extends('layouts/layout')

@section('title')
Home
@endsection

@section('content')
<div class='page-title' id="init">
	<h1>TODO App</h1>
	<a class="button" href='{{ url('/add') }}'>Add todo</a>
</div>
<div class="todo">
	<ul class="todo-list">
	@foreach ($todos as $todo)
		<li class="bg todo-item">
			<div class="container-1">
				<h1 class="todo-title">{{ $todo->name }}</h1>
				<div class="container-1">
					@if ($todo->status === "done")
						<a href="{{ route('todo.check', $todo->id) }}"><x-heroicon-s-check-circle class="icon-style" /></a>
					@else
						<a href="{{ route('todo.check', $todo->id) }}"><x-heroicon-s-check-circle class="icon-style disable" /></a>
					@endif
					<a href="{{ route('todo.edit', $todo->id) }}"><x-heroicon-o-pencil class="icon-style" /></a>
					<a href="{{ route('todo.delete', $todo->id) }}"><x-heroicon-o-trash class="icon-style" /></a>

				</div>
			</div>
			<div class="container-1">
				<div class="todo-dates">
					<p>Create in: <span>{{ $todo->date_c }}</span></p>
					<p>Finish in: <span>{{ $todo->date_f }}</span></p>
				</div>
				<div class="container-1 todo-status">
					<p class="bg bg1-dark" id="priority">{{ $todo->priority }}</p>
					<p class="bg" id="status">{{ $todo->status }}</p>
				</div>
			</div>
		</li>
	@endforeach 
	</ul>
</div>
<div class='page-title'>
	<h1>Pending</h1>
</div>
<div class="todo">
	<ul class="todo-list">
	@foreach ($todos as $todo)
		@if ($todo->status !== "done")
			<li class="bg todo-item">
				<div class="container-1">
					<h1 class="todo-title">{{ $todo->name }}</h1>
					<div class="container-1">
					@if ($todo->status === "done")
						<a href="{{ route('todo.check', $todo->id) }}"><x-heroicon-s-check-circle class="icon-style" /></a>
					@else
						<a href="{{ route('todo.check', $todo->id) }}"><x-heroicon-s-check-circle class="icon-style disable" /></a>
					@endif
					<a href="{{ route('todo.edit', $todo->id) }}"><x-heroicon-o-pencil class="icon-style" /></a>
					<a href="{{ route('todo.delete', $todo->id) }}"><x-heroicon-o-trash class="icon-style" /></a>
					</div>
				</div>
				<div class="container-1">
					<div class="todo-dates">
						<p>Create in: <span>{{ $todo->date_c }}</span></p>
						<p>Finish in: <span>{{ $todo->date_f }}</span></p>
					</div>
					<div class="container-1 todo-status">
						<p class="bg bg1-dark" id="priority">{{ $todo->priority }}</p>
						<p class="bg" id="status">{{ $todo->status }}</p>
					</div>
				</div>
			</li>
		@endif
	@endforeach 
	</ul>
</div>
<div class='page-title'>
	<h1>Finished</h1>
</div>
<div class="todo">
	<ul class="todo-list">
	@foreach ($todos as $todo)
		@if ($todo->status === "done")
			<li class="bg todo-item">
				<div class="container-1">
					<h1 class="todo-title">{{ $todo->name }}</h1>
					<div class="container-1">
					@if ($todo->status === "done")
						<a href="{{ route('todo.check', $todo->id) }}"><x-heroicon-s-check-circle class="icon-style" /></a>
					@else
						<a href="{{ route('todo.check', $todo->id) }}"><x-heroicon-s-check-circle class="icon-style disable" /></a>
					@endif
					<a href="{{ route('todo.edit', $todo->id) }}"><x-heroicon-o-pencil class="icon-style" /></a>
					<a href="{{ route('todo.delete', $todo->id) }}"><x-heroicon-o-trash class="icon-style" /></a>
					</div>
				</div>
				<div class="container-1">
					<div class="todo-dates">
						<p>Create in: <span>{{ $todo->date_c }}</span></p>
						<p>Finish in: <span>{{ $todo->date_f }}</span></p>
					</div>
					<div class="container-1 todo-status">
						<p class="bg bg1-dark" id="priority">{{ $todo->priority }}</p>
						<p class="bg" id="status">{{ $todo->status }}</p>
					</div>
				</div>
			</li>
		@endif
	@endforeach 
	</ul>
</div>
<script src="{{ asset('js/home.js') }}"></script>
@endsection
