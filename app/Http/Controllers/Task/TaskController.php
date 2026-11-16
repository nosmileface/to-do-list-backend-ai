<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Repositories\Task\TaskRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository){}

    public function index(): View
    {
        $tasks = $this->taskRepository->all(userId: auth()->user()->id);

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show(int $id): View
    {
        $task = $this->taskRepository->findById(
            userId: auth()->user()->id,
            id: $id
        );

        return view('tasks.show', ['task' => $task]);
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $createTaskRequest): RedirectResponse
    {
        $this->taskRepository->create(
            userId: auth()->user()->id,
            data: $createTaskRequest->validated()
        );

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно добавлена.');
    }

    public function edit(int $id): View
    {
        $task = $this->taskRepository->findById(
            userId: auth()->user()->id,
            id: $id
        );

        return view('tasks.edit', ['task' => $task]);
    }

    public function update(int $id, UpdateTaskRequest $updateTaskRequest): RedirectResponse
    {
        $this->taskRepository->update(
            userId: auth()->user()->id,
            id: $id,
            data: $updateTaskRequest->validated()
        );

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно обновлена.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->taskRepository->delete(
            userId: auth()->user()->id,
            id: $id
        );

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно удалена.');
    }
}
