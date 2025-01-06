<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('My Tasks') }}
            </h2>
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
                                    <th>Manager</th>
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
                                            
                                            {{ $task->manager->name }}
                                          
                                        </td>
                                        <td>
                                            <a href="{{ route('staff.view', $task->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> View
                                            </a>

                                           <a href="#" 
                                                onclick="event.preventDefault(); confirmDone('{{ route('staff.done', $task->id) }}');" 
                                                class="btn btn-sm btn-success">
                                                <i class="bi bi-check-circle"></i> Done
                                            </a>

                                        
                                         
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            function confirmDone(url) {
                                if (confirm('Are you sure you want to mark this task as done?')) {
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
