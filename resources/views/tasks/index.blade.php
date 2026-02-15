<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Task Creation Form -->
                <form action="{{ route('tasks.store') }}" method="POST" class="mb-6">
                    @csrf
                    <div class="flex flex-col mb-4">
                        <x-input-label for="title" :value="__('Task Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required placeholder="What needs to be done?" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="flex flex-col mb-4">
                        <x-input-label for="description" :value="__('Description (Optional)')" />
                        <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="3"></textarea>
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
                    <div class="flex items-center justify-between p-4 border rounded-lg {{ $task->is_completed ? 'bg-gray-50 opacity-75' : 'bg-white' }}">
                        <div class="flex items-center space-x-4">
                            <form action="{{ route('tasks.update', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" onChange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-6 h-6">
                            </form>
                            <div>
                                <h3 class="text-lg font-medium {{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-900' }}">
                                    {{ $task->title }}
                                </h3>
                                @if($task->description)
                                <p class="text-sm text-gray-500">{{ $task->description }}</p>
                                @endif
                            </div>
                        </div>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center">No tasks found. Add one above!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>