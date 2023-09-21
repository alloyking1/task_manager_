<?php

namespace App\Services;

use App\Models\Task;

use App\Dto\TaskDto;

class TaskService
{

    public function createOrUpdateTask(TaskDto $dto, $id = null)
    {
        $task = Task::updateOrCreate(
            ['id' => $id],
            [
                'user_id' => $dto->user_id,
                'table_id' => $dto->table_id,
                'name' => $dto->name,
                'priority' => $dto->priority,

            ]
        );

        return;
    }
}
