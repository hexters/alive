@php
    $hasSubmenus = count($menu['submenu']) > 0;
    $linkClass = 'flex py-2 rounded-lg justify-between cursor-pointer items-center gap-2 ' . ($isSubmenu ? 'hover:text-primary-content ' : 'hover:bg-neutral-focus') . ($menu['active'] ? ' text-primary-content' : '') . (($menu['open'] && !$isSubmenu) || ($menu['active'] && !$isSubmenu) ? ' bg-primary-focus' : '');
    $badge = app($menu['source'])->getBadge();
@endphp

@if (!$hide && $menu['divider'])
    <li class="text-lg text-primary-content pl-4 my-2 font-medium">{{ __($menu['divider']) }}</li>
@endif

<li wire:key='{{ $menu['gate'] }}'
    class="{{ $hasSubmenus ? 'has-submenus' : '' }} relative block text-left {{ $hide && !$menu['open'] && !$isSubmenu ? 'tooltip-right tooltip' : '' }}"
    data-tip="{{ $menu['name'] }}"
    @if ($isSubmenu && $hide) wire:click.outside="menuToggle('{{ $menu['id'] }}', 'false')" @endif>

    @if ($hasSubmenus)
        <label wire:click="menuToggle('{{ $menu['id'] }}', {{ $menu['open'] ? 'true' : 'false' }})"
            class="{{ $linkClass }}">
            <div class="ml-2">
                {!! $isSubmenu ? '' : $menu['icon'] !!}
            </div>
            @if (!$hide || $isSubmenu)
                <span class="flex-grow">{{ $menu['name'] }}</span>
            @endif

            @if ($badge > 0)
            <span class="badge badge-sm badge-error text-white">{{ $badge }}</span>
            @endif
        </label>
    @else
        <a href="{{ $menu['url'] }}" wire:navigate
            class="{{ $linkClass }} {{ $isSubmenu && !$hide ? 'before:border before:w-3 before:border-primary-content before:border-dashed' : '' }}">
            @if (!$isSubmenu)
                <div class="ml-2">{!! $menu['icon'] !!}</div>
            @endif
            @if (!$hide || $isSubmenu)
                <span class="flex-grow">{{ $menu['name'] }}</span>
            @endif
            @if ($badge > 0)
            <span class="badge badge-sm badge-error text-white">{{ $badge }}</span>
            @endif
        </a>
    @endif

    @if ($hasSubmenus && !$hide)
        <ul class="ml-5 border-l-2 border-primary-content border-dotted {{ $menu['open'] ? '' : 'hidden' }}">
            {!! $renderMenu($menu['submenu'], true) !!}
        </ul>
    @endif

    @if ($menu['open'] && $hide)
        <ul class="absolute bg-neutral -right-[260px] p-2 -top-0 rounded-md w-[250px] shadow-md">
            {!! $renderMenu($menu['submenu'], true) !!}
        </ul>
    @endif
</li>
