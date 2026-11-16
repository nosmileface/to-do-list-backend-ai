<?php

namespace App\Repositories\Task;

use App\Constants\Query;
use App\Models\Task\Task;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository
{
    public function __construct(private Task $todo){}

    public function all(int $userId): LengthAwarePaginator
    {
        return $this->todo->query()
            ->where('user_id', $userId)
            ->orderBy(Query::COLUMN_ID, Query::SORT_DESCt)
            ->paginate(Query::PER_PAGE);
    }

    public function findById(int $userId, int $id): Task
    {
        return $this->todo->query()->where('user_id', $userId)->findOrFail($id);
    }

    public function create(int $userId, array $data): Task
    {
        $data['user_id'] = $userId;

        return $this->todo->query()->create($data);
    }

    public function update(int $userId, int $id, array $data): Task
    {
        $todo = $this->todo->query()->where('user_id', $userId)->findOrFail($id);

        $todo->update($data);

        return $todo;
    }

    public function delete(int $userId, int $id): bool
    {
        return $this->todo->query()->where('user_id', $userId)->findOrFail($id)->delete();
    }
}
