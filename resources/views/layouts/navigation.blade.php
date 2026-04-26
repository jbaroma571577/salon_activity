<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('services.index')" :active="request()->routeIs('services.*')">
                        Services
                    </x-nav-link>

                    <x-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments.*')">
                        Appointments
                    </x-nav-link>

                    <x-nav-link :href="route('payments.index')" :active="request()->routeIs('payments.*')">
                        Payments
                    </x-nav-link>

                </div>
            </div>

            <!-- Auth Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                            {{ auth()->user()->name ?? 'User' }}

                            <div class="ms-1">▼</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('dashboard')">
                            Dashboard
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>

                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:underline">
                        Login
                    </a>

                    <span class="mx-2 text-gray-400">|</span>

                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:underline">
                        Create Account
                    </a>
                @endauth

            </div>

            <!-- Mobile Button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 text-gray-400">
                    ☰
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <x-responsive-nav-link :href="route('dashboard')">
            Dashboard
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('services.index')">
            Services
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('appointments.index')">
            Appointments
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('payments.index')">
            Payments
        </x-responsive-nav-link>

        <hr class="my-2">

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 text-sm">
                    Log Out
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm">
                Login
            </a>

            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm">
                Create Account
            </a>
        @endauth

    </div>

</nav>