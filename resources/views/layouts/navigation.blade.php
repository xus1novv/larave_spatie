<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center space-x-4 overflow-x-auto">
        <div class="flex items-center space-x-4">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex space-x-4 overflow-x-auto">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Statistika') }}
                </x-nav-link>
                <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
                    {{ __('Ruxsatlar') }}
                </x-nav-link>
                <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
                    {{ __('Rollar') }}
                </x-nav-link>
                <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                    {{ __('Foydalanuvchilar') }}
                </x-nav-link>
                <x-nav-link :href="route('settings.index')" :active="request()->routeIs('settings.index')">
                    {{ __('Sozlamalar') }}
                </x-nav-link>
                <x-nav-link :href="route('service.index')" :active="request()->routeIs('service.index')">
                    {{ __('Xizmatlar') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.about.index')" :active="request()->routeIs('admin.about.index')">
                    {{ __('Biz haqimizda') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.work.index')" :active="request()->routeIs('admin.work.index')">
                    {{ __('Bizning natijalar') }}
                </x-nav-link>
                <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')">
                    {{ __('Mijoz hisobi') }}
                </x-nav-link>
                <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.index')">
                    {{ __('Buyurtmalar') }}
                </x-nav-link>
                <x-nav-link :href="route('admin.sub.index')" :active="request()->routeIs('admin.sub.index')">
                    {{ __('Obuna qo\'shish') }}
                </x-nav-link>
            </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</div>
