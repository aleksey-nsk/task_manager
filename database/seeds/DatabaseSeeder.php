<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// Для того чтобы класс DatabaseSeeder мог обратиться к 
// нашей модели Task, необходимо прописать путь: 
use App\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class); // это образец 

        // Чтобы класс TasksSeeder запустился, его надо
        // прописать в главном классе DatabaseSeeder, а именно в 
        // публичном методе run():
        $this->call(TasksSeeder::class);

        Model::reguard();
    }
}

// Добавим класс TasksSeeder:
class TasksSeeder extends Seeder
{
    public function run()
    {
        DB::table('tasks')->delete(); // сначала очищаем всю таблицу 

        // Создадим 2 тестовые записи. Обращаемся к модели Task, вызываем
        // метод create(), и передаём массив параметров: 
        Task::create(['name' => 'Первая тестовая задача']);
        Task::create(['name' => 'Вторая тестовая задача']);        
    }
}  
