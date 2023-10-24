<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Administrator' }}</title>

    @vite(['resources/js/app.js', 'resources/css/app.css', 'Modules/Alive/Resources/js/alive.js', 'Modules/Alive/Resources/css/alive.css'])

</head>

<body>
    @php
        $user = auth()->user();
    @endphp
    <div class="drawer">
        <input id="admin-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">
            <div class="flex">

                <div class="hidden lg:block w-auto">
                    <livewire:alive-sidebar :user="$user" />
                </div>

                <div class="flex-grow">

                    <livewire:alive-navbar :user="$user">
                        <livewire:alive-flash />
                        <div class="container mx-auto p-4 min-h-screen">
                            {{ $slot }}
                        </div>

                        <footer class="px-4 bg-base-200 p-4">
                            @include('alive::components.layouts._parts.footer')
                        </footer>
                </div>
            </div>
        </div>
        <div class="drawer-side">
            <label for="admin-drawer" aria-label="close sidebar" class="drawer-overlay"></label>

            <div class="lg:hidden min-h-screen bg-neutral text-neutral-content">
                <livewire:alive-sidebar :user="$user" />
            </div>

        </div>
    </div>
</body>

</html>
