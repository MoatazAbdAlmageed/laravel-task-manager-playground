<?php

use Livewire\Volt\Component;
use App\Models\Task;
use App\Services\TaskService;
use App\DTOs\TaskData;
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('nullable|string')]
    public string $description = '';

    public function addTask(TaskService $taskService)
    {
        $this->validate();

        $taskService->createTask(
            auth()->user(),
            new TaskData($this->title, $this->description)
        );

        $this->reset(['title', 'description']);

        session()->flash('success', 'Task created successfully.');
    }

    public function toggleTask(Task $task, TaskService $taskService)
    {
        $this->authorize('update', $task);
        $taskService->toggleStatus($task);
        session()->flash('success', 'Task status updated.');
    }

    public function deleteTask(Task $task, TaskService $taskService)
    {
        $this->authorize('delete', $task);
        $taskService->deleteTask($task);
        session()->flash('success', 'Task deleted successfully.');
    }

    public function with(): array
    {
        return [
            'tasks' => auth()->user()->tasks()->latest()->get(),
        ];
    }
};
?>

<div>
    @if (session()->has('success'))
        <div class="mb-4 font-medium text-sm text-green-600 bg-green-100 p-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Task Creation Form -->
    <form wire:submit="addTask" class="mb-6">
        <div class="flex flex-col mb-4">
            <x-input-label for="title" :value="__('Task Title')" />
            <x-text-input id="title" wire:model="title" class="block mt-1 w-full" type="text" required placeholder="What needs to be done?" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="flex flex-col mb-4">
            <x-input-label for="description" :value="__('Description (Optional)')" />
            <textarea id="description" wire:model="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="3"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('Add Task') }}
        </x-primary-button>
    </form>

    <hr class="my-6">

    <!-- Task List -->
    <div class="space-y-4">
        @forelse ($tasks as $task)
        <div wire:key="{{ $task->id }}" class="flex items-center justify-between p-4 border rounded-lg {{ $task->is_completed ? 'bg-gray-50 opacity-75' : 'bg-white' }}">
            <div class="flex items-center space-x-4">
                <input type="checkbox" wire:click="toggleTask({{ $task->id }})" {{ $task->is_completed ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-6 h-6 cursor-pointer">
                <div>
                    <h3 class="text-lg font-medium {{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-900' }}">
                        {{ $task->title }}
                    </h3>
                    @if($task->description)
                    <p class="text-sm text-gray-500">{{ $task->description }}</p>
                    @endif
                </div>
            </div>

            <button type="button" wire:click="deleteTask({{ $task->id }})" wire:confirm="Are you sure?" class="text-red-500 hover:text-red-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </div>
        @empty
        <p class="text-gray-500 text-center">No tasks found. Add one above!</p>
        @endforelse
    </div>
</div>