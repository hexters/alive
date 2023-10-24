<div>
    <div class="flex justify-between items-center py-2 px-4 gap-4 bg-transparent">
        <div class="flex items-center gap-2 lg:px-4">
            <label for="admin-drawer" class="btn btn-ghost p-0 drawer-button lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </label>

            <h3 class="font-bold truncate flex-none w-40 lg:w-auto text-lg flex-grow">{{ config('alive.page_title', '')  }}</h3>
        </div>
        <div class="flex-grow">

        </div>
        <div class="flex items-center gap-4">

            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle">
                    <div class="indicator">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                        <span class="indicator-item badge-xs badge badge-secondary"></span>
                    </div>
                </label>
                <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                    <div class="card-body">
                        <span class="font-bold text-lg">8 Items</span>
                        <span class="text-info">Subtotal: $999</span>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-block">View cart</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="{{ $user->avatar }}" />
                    </div>
                </label>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            {{ $user->name }}
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li>
                        <a href="" wire:click.prevent="toggleLogoutModal">{{ __('Logout') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <input type="checkbox" id="logout-modal" wire:model='confirm' class="modal-toggle" />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">{{ __('Logout') }}</h3>
            <p class="py-4">{{ __('Are you sure you want to leave this page?') }}</p>
            <div class="modal-action">
                <button class="btn"  wire:click='toggleLogoutModal'>{{ __('No') }}</button>
                <Button class="btn btn-primary" wire:click='logout'>{{ __('Yes') }}</Button>
            </div>
        </div>
    </div>
</div>
