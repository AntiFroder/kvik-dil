<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskService
{
    public function getTasks(): array
    {
        return [
            'tasks' => TaskResource::collection(Task::get()),
        ];
    }

    public function getTask(Task $task): array
    {
        return [
            'success' => true,
            'task' => TaskResource::make($task),
        ];
    }

    public function taskStore(array $request): array
    {
        $task = Task::create($request);
        return $this->getTask($task);
    }

    public function taskUpdate(array $request, Task $task): array
    {
        $task->update($request);
        $task->refresh();
        return $this->getTask($task);
    }

    public function taskDelete(Task $task): array
    {
        $task->delete();
        return [
            'success' => true,
        ];
    }

    public function filterTask(array $request): array
    {
        $tasksQuery = Task::query();
        if (isset($request['status'])) {
            $tasksQuery->where('status', $request['status']);
        }
        if (isset($request['created_date'])) {
            $tasksQuery->where('created_date', $request['created_date']);
        }
        return [
            'tasks' => TaskResource::collection($tasksQuery->get()),
        ];
    }

}
