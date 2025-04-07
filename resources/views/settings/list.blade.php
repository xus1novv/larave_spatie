<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Settings') }}
            </h2>
            <a href="{{ route('settings.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Create Setting
            </a>
        </div>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <x-message></x-message>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Working Hours</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Social Networks</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($settings->isNotEmpty())
                                        @foreach ($settings as $setting)
                                        <tr>
                                            <td>{{ $setting->id }}</td>
                                            <td>{{ $setting->site_name }}</td>
                                            <td>{{ $setting->phone }}</td>
                                            <td>{{ $setting->email }}</td>
                                            <td>{{ $setting->working_hours }}</td>
                                            <td>{{ $setting->address }}</td>
                                            
                                            <!-- Social Networks -->
                                            <td>
                                                @php
                                                    $socialLinks = [
                                                        'Instagram' => $setting->instagram_url,
                                                        'Telegram' => $setting->telegram_url,
                                                        'YouTube' => $setting->youtube_url,
                                                        'Facebook' => $setting->facebook_url,
                                                        'X' => $setting->x_url
                                                    ];
                                                @endphp

                                                @foreach ($socialLinks as $name => $url)
                                                    @if ($url)
                                                        <a href="{{ $url }}" target="_blank" class="badge bg-primary">{{ $name }}</a>
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-sm btn-success">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>

                                                <form action="{{ route('settings.destroy', $setting->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center">No settings found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>
