<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('settings.update', $setting->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Site Name</label>
                        <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Working Hours</label>
                        <input type="text" name="working_hours" value="{{ old('working_hours', $setting->working_hours) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Address</label>
                        <textarea name="address" class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('address', $setting->address) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Instagram URL</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $setting->instagram_url) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Telegram URL</label>
                        <input type="url" name="telegram_url" value="{{ old('telegram_url', $setting->telegram_url) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">YouTube URL</label>
                        <input type="url" name="youtube_url" value="{{ old('youtube_url', $setting->youtube_url) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Facebook URL</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">X (Twitter) URL</label>
                        <input type="url" name="x_url" value="{{ old('x_url', $setting->x_url) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm">
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('settings.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
