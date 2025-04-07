<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Create New Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Site Name -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Site Name:</label>
                            <input type="text" name="site_name" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter site name">
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Phone Number:</label>
                            <input type="text" name="phone_number" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter phone number">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Email:</label>
                            <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter email">
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Address:</label>
                            <textarea name="address" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter address"></textarea>
                        </div>

                        <!-- Working Hours -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Working Hours:</label>
                            <input type="text" name="working_hours" class="w-full px-4 py-2 border rounded-lg" placeholder="e.g. Mon-Fri: 9AM - 6PM">
                        </div>

                        <!-- Logo Upload -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Logo:</label>
                            <input type="file" name="logo" class="w-full px-4 py-2 border rounded-lg">
                        </div>

                        <!-- Social Media Links -->
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Instagram URL:</label>
                            <input type="text" name="instagram_url" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter Instagram link">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Telegram URL:</label>
                            <input type="text" name="telegram_url" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter Telegram link">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Facebook URL:</label>
                            <input type="text" name="facebook_url" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter Facebook link">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">YouTube URL:</label>
                            <input type="text" name="youtube_url" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter YouTube link">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">X (Twitter) URL:</label>
                            <input type="text" name="x_url" class="w-full px-4 py-2 border rounded-lg" placeholder="Enter X (Twitter) link">
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-bold rounded">
                                Create Setting
                            </button>
                            <a href="{{ route('settings.index') }}" class="px-6 py-2 bg-gray-500 text-white font-bold rounded">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
