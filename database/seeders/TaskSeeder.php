<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tasks = [
            [
                'title' => 'Написать документацию',
                'description' => 'Создать подробное описание проекта Laravel',
                'status' => 'Новая',
            ],
            [
                'title' => 'Сделать CRUD для задач',
                'description' => 'Реализовать создание, редактирование, удаление и просмотр задач',
                'status' => 'В работе',
            ],
            [
                'title' => 'Протестировать AJAX обновление статуса',
                'description' => 'Убедиться, что статус меняется без перезагрузки страницы',
                'status' => 'Выполнена',
            ],
            [
                'title' => 'Добавить поиск и фильтрацию',
                'description' => 'Реализовать поиск по названию и фильтр по статусу',
                'status' => 'Новая',
            ],
            [
                'title' => 'Настроить пагинацию',
                'description' => 'Отображать не более 10 задач на странице',
                'status' => 'В работе',
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
