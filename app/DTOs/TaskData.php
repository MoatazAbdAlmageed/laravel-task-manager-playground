<?php

namespace App\DTOs;

use Illuminate\Http\Request;

readonly class TaskData
{
    public function __construct(
        public string $title,
        public ?string $description = null,
    ) {}

    /**
     * Create a DTO from a validated request.
     */
    public static function fromRequest(Request $request): self
    {
        return new self(
            title: $request->validated('title'),
            description: $request->validated('description'),
        );
    }

    /**
     * Convert the DTO to an array for Eloquent.
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
