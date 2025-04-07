<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Our Works') }}
            </h2>
            <a href="{{ route('admin.work.create') }}" class="btn btn-success text-white px-4 py-2 rounded">
                Create Work
            </a>
        </div>        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
                        <x-message></x-message>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Sarlavha</th>
                                                <th scope="col">Tozalanmagan rasm</th>
                                                <th scope="col">Tozalangan rasm</th>
                                                <th scope="col">Tavsif</th>
                                                <th scope="col">Harakatlar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($works->isNotEmpty())
                                                @foreach ($works as $work)
                                                    <tr>
                                                        <td>{{ $work->id }}</td>
                                                        <td>{{ $work->title }}</td>
                                                        <td>
                                                            @if ($work->before_image)
                                                                <img src="{{ asset('storage/' . $work->before_image) }}" alt="{{ $work->title }} Before" style="max-width: 100px;">
                                                            @else
                                                                Rasm yo‘q
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($work->after_image)
                                                                <img src="{{ asset('storage/' . $work->after_image) }}" alt="{{ $work->title }} After" style="max-width: 100px;">
                                                            @else
                                                                Rasm yo‘q
                                                            @endif
                                                        </td>
                                                        <td>{{ $work->description ?? 'Tavsif yo‘q' }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.work.edit', $work->id) }}" class="btn btn-sm btn-success">
                                                                <i class="bi bi-pencil"></i> Tahrirlash
                                                            </a>
                                                            <form action="{{ route('admin.work.destroy', $work->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bu ishni o‘chirishni xohlaysizmi?')">O‘chirish</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-center">Hech qanday ish topilmadi.</td>
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
        </div>
    </div>
</x-app-layout>