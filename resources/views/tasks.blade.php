@extends('layouts.app') 
<!-- подключили наш глобальный лэйаут app (глобальный шаблон app) -->

@section('content')

	@if (count($errors) > 0)
	<!-- Переменная $errors доступна в ЛЮБОМ представлении Laravel. 
	     Если не будет ошибок ввода, тогда она просто будет 
	     пустым экземпляром ViewErrorBag --> 
	<div class="alert-error">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
	    </ul>
	</div>
	@endif 

	<div class="add_task"> 
		<div class="my_title">New Task</div>  			          
		<form method="POST" action="{{ route('taskStore') }}"> 
			<b>Task</b><br>       
			<input type="text" name="name" size="60"><br>				
			<button type="submit" class="send">Add Task</button> <!-- кнопка отправки формы -->
			{{ csrf_field() }} 
		</form>   
	</div> <!-- /add_task -->

	<div class="show_tasks">
		<div class="my_title">Current Tasks</div>
		@if (count($tasks) > 0)
			<div class="word_tasks">
				<b>Tasks</b> 
				<hr>
			</div>

			@foreach ($tasks as $task) 
			<div class="each_task"> 
				<div class="each_task_name">{{ $task->name }}</div>
								
				<form action="{{ route('taskDelete', ['task' => $task->id]) }}" method="POST">             
					<!-- <input type="hidden" name="_method" value="DELETE"> -->
					{{ method_field('DELETE') }}             
					{{ csrf_field() }}             
					<button type="submit" class="delete">Delete</button>
					<hr>
				</form> 				
			</div> <!-- /each_task --> 
			@endforeach
		@endif
	</div> <!-- /show_tasks -->
	   
@endsection
