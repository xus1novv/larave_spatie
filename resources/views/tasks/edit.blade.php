<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="card shadow-sm p-4">
                        <form action="{{ route('tasks.update', $task->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- Task Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Task Title</label>
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    placeholder="Enter task title" 
                                    value="{{ old('title',$task->title) }}"
                                    required
                                >
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Task Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Task Description</label>
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    placeholder="Enter task description"
                                    required
                                >{{ old('description', $task->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Task Deadline -->
                            <div class="mb-4">
                                <label for="deadline" class="form-label fw-bold">Deadline</label>
                                <input 
                                    type="datetime-local" 
                                    name="deadline" 
                                    id="deadline" 
                                    class="form-control @error('deadline') is-invalid @enderror" 
                                    value="{{ old('deadline',$task->deadline) }}"
                                    required
                                >
                                @error('deadline')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Select User for the Task -->
                            <div class="mb-4">
                                <label for="user_id" class="form-label fw-bold">Assign Task to User</label>
                                <select 
                                    name="user_id" 
                                    id="user_id" 
                                    class="form-control @error('user_id') is-invalid @enderror" 
                                    required
                                >
                                    <option value="">Select a Staff</option>
                                    @foreach($staffs as $staff)
                                        <option value="{{ $staff->id }}" 
                                            {{ old('user_id', $task->user_id) == $staff->id ? 'selected' : '' }}>
                                            {{ $staff->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <!-- File Upload -->
                            <div class="mb-4">
                                <label for="file" class="form-label fw-bold">Upload File</label>
                                <input 
                                    type="file" 
                                    name="file" 
                                    id="file" 
                                    class="form-control @error('file') is-invalid @enderror" 
                                    accept="image/*,application/pdf"
                                >
                                
                                @if ($task->file_path)
                                    <div class="mt-2">
                                        <strong>Existing file:</strong>
                                        <a href="{{ Storage::url($task->file_path) }}" target="_blank">{{ basename($task->file_path) }}</a>
                                    </div>
                                @endif
                            
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            

                            <button type="submit" class="btn btn-success w-100">Edit Task</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>