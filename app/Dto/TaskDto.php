<?php

namespace App\Dto;

class TaskDto
{

    public function __construct(
        public readonly string $user_id,
        public readonly string $table_id,
        public readonly string $name,
        public readonly string $priority,
    ) {
    }

    public static function requestValue($validated = [])
    {
        return new self(
            user_id: $validated['user_id'],
            table_id: $validated['table_id'],
            name: $validated['name'],
            priority: $validated['priority'],
        );
    }
}
