<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\TaskFilterRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TasksController extends Controller
{
    public function __construct(protected TaskService $service)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->service->getTasks());
    }

    public function filterTask(TaskFilterRequest $request)
    {
        return response()->json($this->service->filterTask($request->validated()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTasksRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTasksRequest $request): JsonResponse
    {
        return response()->json($this->service->taskStore($request->validated()));
    }

    public function edit(Task $task): JsonResponse
    {
        return response()->json($this->service->getTask($task));
    }

    public function update(UpdateTasksRequest $request, Task $task): JsonResponse
    {
        return response()->json($this->service->taskUpdate($request->validated(), $task));
    }

    public function destroy(Task $task): JsonResponse
    {
        return response()->json($this->service->taskDelete($task));
    }
}
