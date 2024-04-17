@if (session()->has('success') || session()->has('error') || session()->has('info'))
    @foreach (['success', 'error', 'info'] as $type)
        @if (session()->has($type))
            @php
                if ($type == 'success') {
                    $colors = 'bg-green-200 dark:bg-green-800 border-green-300 text-green-800 dark:text-green-200';
                } elseif ($type == 'error') {
                    $colors = 'bg-red-200 dark:bg-red-800 border-red-300 text-red-800 dark:text-red-200';
                } else {
                    $colors = 'bg-blue-200 dark:bg-blue-800 border-blue-300 text-blue-800 dark:text-blue-200';
                }
            @endphp
            @if ($message = Session::get($type))
                <div class="relative px-3 py-3 m-4 border rounded font-medium text-md {{ $colors }}">
                    {{ $message }}
                </div>
            @endif
        @endif
    @endforeach
@endif
