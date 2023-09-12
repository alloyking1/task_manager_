<?php

namespace App\Dto;

class ProjectDto
{

    public function __construct(
        public readonly string $user_id,
        public readonly string $name,
        public readonly string $description
    ) {
    }

    public static function requestValue($validated = [])
    {
        return new self(
            user_id: $validated['user_id'],
            name: $validated['name'],
            description: $validated['description']
        );
    }
}
