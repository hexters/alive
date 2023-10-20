<div class="bg-neutral text-neutral-content duration-300 {{ $hide ? 'w-[50px]' : 'w-[250px]' }} min-h-full">

    <div class="hidden lg:flex justify-between items-center p-4 mb-4">
        <strong class="text-xl">{{ $hide ? '' : config('app.name') }}</strong>
        <label class="btn -me-8 btn-sm btn-circle swap swap-rotate">

            <!-- this hidden checkbox controls the state -->
            <input wire:click='toggle' @checked(!$hide) type="checkbox" />

            <!-- hamburger icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 swap-off">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>


            <!-- close icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8 swap-on">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

        </label>
    </div>

    
</div>
