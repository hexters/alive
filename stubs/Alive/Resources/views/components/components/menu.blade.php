@php
    $hasSubmenus = count($submenu) > 0;
@endphp

@if (!$hide && $divider)
    <li class="text-lg text-primary-content pl-4 my-2 font-medium">{{ __($divider) }}</li>
@endif

<li class="hover:bg-neutral-focus menu-item {{ $hasSubmenus ? 'has-submenus' : '' }} relative {{ $hide ? 'tooltip-right tooltip' : '' }}"
    data-tip="{{ $name }}">

    @if ($hasSubmenus)
        <label class="flex p-2 justify-between cursor-pointer items-center gap-4">
            <div>
                {!! $isSubmenu ? '' : $icon !!}
            </div>
            @if (!$hide || $isSubmenu)
                <span class="flex-grow">{{ $name }}</span>
            @endif
        </label>
    @else
        <a href="" wire:navigate class="flex p-2 justify-between items-center gap-4">
            <div>
                {!! $isSubmenu ? '' : $icon !!}
            </div>
            @if (!$hide || $isSubmenu)
                <span class="flex-grow">{{ $name }}</span>
            @endif
        </a>
    @endif

    @if ($hasSubmenus)
        <ul class="bg-neutral hidden">
            {!! $renderMenu($submenu, true) !!}
        </ul>
    @endif
</li>
