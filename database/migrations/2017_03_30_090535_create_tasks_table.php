<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations - Запуск миграций
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // добавим столбец для имён наших задач  
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations - Откатить миграции 
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
