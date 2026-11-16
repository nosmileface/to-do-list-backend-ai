<?php

namespace Database\Seeders\Task;

use App\Models\Task\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $tasks = [
            ['title' => 'Изучить Laravel Routing', 'description' => 'Разобраться с маршрутами, группами и middleware.', 'is_completed' => true],
            ['title' => 'Настроить авторизацию', 'description' => 'Реализовать вход и выход пользователя.', 'is_completed' => true],
            ['title' => 'Создать модель Task', 'description' => 'Добавить модель, миграцию и связи с пользователем.', 'is_completed' => true],
            ['title' => 'Реализовать CRUD задач', 'description' => 'Добавить создание, просмотр, редактирование и удаление.', 'is_completed' => true],
            ['title' => 'Добавить валидацию', 'description' => 'Настроить Form Request и сообщения об ошибках.', 'is_completed' => true],

            ['title' => 'Добавить фильтрацию задач', 'description' => 'Реализовать фильтры по статусу выполнения.', 'is_completed' => false],
            ['title' => 'Реализовать поиск', 'description' => 'Добавить поиск задач по названию.', 'is_completed' => false],
            ['title' => 'Настроить пагинацию', 'description' => 'Выводить задачи постранично.', 'is_completed' => false],
            ['title' => 'Добавить сортировку', 'description' => 'Сортировать задачи по дате создания.', 'is_completed' => false],
            ['title' => 'Реализовать TaskPolicy', 'description' => 'Ограничить доступ к чужим задачам.', 'is_completed' => false],
            ['title' => 'Написать Feature-тесты', 'description' => 'Проверить создание, редактирование и удаление задач.', 'is_completed' => false],
            ['title' => 'Написать Unit-тесты', 'description' => 'Протестировать бизнес-логику репозитория.', 'is_completed' => false],
            ['title' => 'Улучшить интерфейс', 'description' => 'Добавить адаптивную верстку и состояния кнопок.', 'is_completed' => false],
            ['title' => 'Добавить уведомления', 'description' => 'Показывать сообщения об успешных операциях.', 'is_completed' => false],
            ['title' => 'Настроить логирование', 'description' => 'Записывать важные события приложения.', 'is_completed' => false],
            ['title' => 'Оптимизировать запросы', 'description' => 'Проверить SQL-запросы и устранить лишние обращения к БД.', 'is_completed' => false],
            ['title' => 'Добавить REST API', 'description' => 'Создать API для управления задачами.', 'is_completed' => false],
            ['title' => 'Подготовить документацию', 'description' => 'Описать установку и использование проекта.', 'is_completed' => false],
            ['title' => 'Настроить Docker', 'description' => 'Подготовить контейнеры для приложения и базы данных.', 'is_completed' => false],
            ['title' => 'Развернуть проект', 'description' => 'Опубликовать приложение на сервере.', 'is_completed' => false],
        ];

        foreach ($tasks as $task) {
            Task::query()->create(['user_id' => 1, ...$task]);
        }
    }
}
