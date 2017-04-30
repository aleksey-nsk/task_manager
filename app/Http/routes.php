<?php

use App\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// На главной странице проекта будет отображаться 
// форма для добавления новой задачи,
// а также текущий список задач.
// Создадим маршрут, который обработает запрос 
// на отображение главной страницы проекта:
Route::get('/', 'TaskController@index');

// Маршрут, который обработает запрос 
// на сохранение новой задачи: 
Route::post('/task/add', 'TaskController@store')->name('taskStore'); 

// Удалить задачу: создадим маршрут, который 
// будет обрабатывать запросы типа DELETE. 
// Прямо тут опишем код функции-обработчика данного маршрута:  
Route::delete('/task/delete/{task}', function($task){ 
	
	// Убедимся что в переменной $task действительно 
	// содержится идентификатор удаляемой задачи: 
	// dump($task);

	// Модель Task расположена в каталоге app
	// При обращении к модели Task используем 
	// полное квалификационное имя \App\Task 
	$task_tmp = \App\Task::where('id', $task)->first();  

	// Убедимся в том, что действительно мы сейчас
	// выбираем необходимую нам модель:  
	// dump($task_tmp); 
	
	// Удалим конкретную запись из БД:  
	$task_tmp->delete(); 

	// Возвращаем конкретный ответ юзеру, то есть
	// выполняем редирект на главную страницу:  
	return redirect('/'); 

})->name('taskDelete'); 
