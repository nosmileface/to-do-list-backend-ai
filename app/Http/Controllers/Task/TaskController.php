<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task\Task;
use App\Repositories\Task\TaskRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository){}

    public function index(): View
    {
        $tasks = $this->taskRepository->all(userId: auth()->user()->id);

        $tasksCount = $this->count();

        $tasksCountActive = $this->active();

        $tasksCountNotActive = $this->notActive();

        return view('tasks.index', [
            'tasks' => $tasks,
            'tasksCount' => $tasksCount,
            'tasksCountActive' => $tasksCountActive,
            'tasksCountNotActive' => $tasksCountNotActive
        ]);
    }

    public function show(Task $task): View
    {
        $task = $this->taskRepository->findById(
            userId: auth()->user()->id,
            id: $task->id
        );

        return view('tasks.show', [
            'task' => $task,
            'title' => 'Задача №:' . $task->id
        ]);
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

    public function edit(Task $task): View
    {
        $task = $this->taskRepository->findById(
            userId: auth()->user()->id,
            id: $task->id
        );

        return view('tasks.edit', [
            'task' => $task,
            'title' => 'Редактировать задачу №:' . $task->id
        ]);
    }

    public function update(UpdateTaskRequest $updateTaskRequest, Task $task): RedirectResponse
    {
        $this->taskRepository->update(
            userId: auth()->user()->id,
            id: $task->id,
            data: $updateTaskRequest->validated()
        );

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно обновлена.');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $this->taskRepository->delete(
            userId: auth()->user()->id,
            id: $task->id
        );

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно удалена.');
    }

    public function toggle(Task $task): RedirectResponse
    {
        $this->taskRepository->toggleActive(
            userId: auth()->user()->id,
            id: $task->id
        );

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно отмечена, как выполненная.');
    }

    private function count(): int
    {
        return $this->taskRepository->count(userId: auth()->user()->id);
    }

    private function active(): int
    {
        return $this->taskRepository->countActive(userId: auth()->user()->id);
    }

    private function notActive(): int
    {
        return $this->taskRepository->countNotActive(userId: auth()->user()->id);
    }
}
