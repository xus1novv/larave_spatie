<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card shadow-sm p-4">
                        <form>
                            <!-- Task Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Task Title</label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    class="form-control" 
                                    value="{{ $task->title }}" 
                                    readonly
                                >
                            </div>

                            <!-- Task Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Task Description</label>
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    class="form-control" 
                                    readonly
                                >{{ $task->description }}</textarea>
                            </div>

                            <!-- Task Deadline -->
                            <div class="mb-4">
                                <label for="deadline" class="form-label fw-bold">Deadline</label>
                                <input 
                                    type="datetime-local" 
                                    name="deadline" 
                                    id="deadline" 
                                    class="form-control" 
                                    value="{{ $task->deadline }}" 
                                    readonly
                                >
                            </div>

                            <!-- Assigned User -->
                            <div class="mb-4">
                                <label for="user_id" class="form-label fw-bold">Assigned User</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="{{ $task->user->name ?? 'Not Assigned' }}" 
                                    readonly
                                >
                            </div>

                            <!-- File -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Uploaded File</label>
                                @if ($task->file_path)
                                    <div>
                                        <a href="{{ Storage::url($task->file_path) }}" target="_blank">{{ basename($task->file_path) }}</a>
                                    </div>
                                @else
                                    <p class="text-muted">No file uploaded</p>
                                @endif
                            </div>
                            
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('tasks.done') }}" class="btn btn-secondary">Back</a>
                            
                    
                            </div>
                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
