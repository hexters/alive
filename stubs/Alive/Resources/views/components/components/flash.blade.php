<div>
    @if ($flash)
        <div class="p-4 bg-{{ $flash['class'] }} text-{{ $flash['class'] }}-content">
            <ul>
                @foreach ($flash['message'] as $message)
                    <li>{!! $message !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
