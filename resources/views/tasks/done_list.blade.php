<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Tasks') }}
            </h2>
            @can('create tasks')
                
            <a href="{{ route('tasks.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Create Task
            </a>

            @endcan
        </div>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Tasks table -->
                    <div class="card shadow-sm p-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Assigned User</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ Str::limit($task->description, 50) }}</td>
                                        <td>{{\Carbon\Carbon::parse($task->created_at)->format('d M, Y')}}</td>
                                        <td>
                                            @switch($task->status)
                                                @case('pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                    @break
                                                @case('accepted')
                                                    <span class="badge bg-info text-dark">Accepted</span>
                                                    @break
                                                @case('completed')
                                                    <span class="badge bg-success">Completed</span>
                                                    @break
                                                @default
                                                    <span class="badge bg-secondary">Done</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @if($task->user_id)
                                                {{ $task->user->name }}
                                            @else
                                                <span class="text-muted">Not Assigned</span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('tasks.view', $task->id) }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-pencil"></i> View
                                            </a> 
                                     
                                            
                                                <form action="{{ route('task.done', $task->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH') <!-- PATCH metodni belgilash -->
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="bi bi-check-circle"></i> Done
                                                    </button>
                                                </form>

                                                <a href="#" 
                                                onclick="event.preventDefault(); confirmCancel('{{ route('task.cancel', $task->id) }}');" 
                                                class="btn btn-danger btn-sm">
                                                <i class="bi bi-check-circle"></i> Cancel
                                            </a>
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <script>
                        
                            function confirmCancel(url) {
                                if (confirm('Are you sure you want to mark this task as cancel?')) {
                                    window.location.href = url;
                                }
                            }
                        </script>
                    </div>

    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
