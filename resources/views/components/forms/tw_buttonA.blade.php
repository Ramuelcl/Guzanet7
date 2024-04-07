@props([
    'name' => 'button',
    'type' => 'button',
    'routeName' => '',
    'color' => 'blue',
    'class' => '',
    'classFix' => 'inline-flex items-center justify-center min-w-20 rounded-md p-2 focus:outline-none focus:ring ',
    'icon' => null,
])
{{-- resources\views\components\tw_button.blade.php --}}
@php
    // dump($routeName);
    $colors = [
        'blue' =>
            'bg-blue-600 dark:bg-blue-400 text-blue-100 dark:text-blue-800 hover:bg-blue-400 dark:hover:bg-blue-200 active:bg-blue-400 dark:active:bg-blue-200 focus:ring-blue-700 dark:focus:ring-blue-500',
        'red' =>
            'bg-red-600 dark:bg-red-400 text-red-100 dark:text-red-800 hover:bg-red-400 dark:hover:bg-red-200 active:bg-red-400 dark:active:bg-red-200 focus:ring-red-700 dark:focus:ring-red-500',
        'gray' =>
            'bg-gray-600 dark:bg-gray-400 text-gray-100 dark:text-gray-800 hover:bg-gray-400 dark:hover:bg-gray-200 active:bg-gray-400 dark:active:bg-gray-200 focus:ring-gray-700 dark:focus:ring-gray-500',
        'green' =>
            'bg-green-600 dark:bg-green-400 text-green-100 dark:text-green-800 hover:bg-green-400 dark:hover:bg-green-200 active:bg-green-400 dark:active:bg-green-200 focus:ring-green-700 dark:focus:ring-green-500',
        'yellow' =>
            'bg-yellow-600 dark:bg-yellow-400 text-yellow-100 dark:text-yellow-800 hover:bg-yellow-400 dark:hover:bg-yellow-200 active:bg-yellow-400 dark:active:bg-yellow-200 focus:ring-yellow-700 dark:focus:ring-yellow-500',
        'black' =>
            'bg-black-600 dark:bg-black-400 text-black-100 dark:text-black-800 hover:bg-black-400 dark:hover:bg-black-200 active:bg-black-400 dark:active:bg-black-200 focus:ring-black-700 dark:focus:ring-black-500',
        'violet' =>
            'bg-violet-600 dark:bg-violet-400 text-violet-100 dark:text-violet-800 hover:bg-violet-400 dark:hover:bg-violet-200 active:bg-violet-400 dark:active:bg-violet-200 focus:ring-violet-700 dark:focus:ring-violet-500',
    ];
    $classFix = $classFix . $colors[$color];

    if ($icon) {
        $iconPath = storage_path('app/public/images/app/icons/outline/' . $icon . '.svg');
        $icon = file_exists($iconPath) ? file_get_contents($iconPath) : null;
    }
@endphp

<a href="{{ $routeName == '' ? redirect()->back() : route($routeName) }}" @class([$classFix, $class])>
    @if (isset($icon))
        {!! $icon !!}
    @endif {{ $slot }}
</a>
