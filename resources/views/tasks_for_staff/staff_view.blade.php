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
                        <!-- Task Details Table -->
                        <h4 class="fw-bold mb-4">Task Details</h4>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $task->title }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $task->description }}</td>
                                </tr>
                                <tr>
                                    <th>Deadline</th>
                                    <td>{{ $task->deadline }}</td>
                                </tr>
                                <tr>
                                    <th>Uploaded File</th>
                                    <td>
                                        @if ($task->file_path)
                                            <a href="{{ Storage::url($task->file_path) }}" target="_blank" class="btn btn-primary">
                                                <i class="bi bi-download"></i> Download File
                                            </a>
                                        @else
                                            <span class="text-muted">No file uploaded</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- File Upload Form -->
                        <div class="mt-4">
                            <h5 class="fw-bold">Upload New File</h5>
                            <form action="{{ route('staff.upload-file', $task->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                                    @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </form>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('staff.list') }}" class="btn btn-secondary w-100">Back to Tasks</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
