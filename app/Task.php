<?php

namespace App;

// Модель Task наследует родительский класс Model
// И доступ к данному классу прописан тут:
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	// Объявим protected-свойство $fillable и в этом свойстве
	// определяем массив со списком тех полей, для которых
	// хотим разрешить массовое заполнение: 
	protected $fillable = ['name'];
}
