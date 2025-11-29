@props([
    'title',
    'svg',
    'link' => '#',
    'active' => false
])

<a href="{{ $link }}"
   class="flex items-center p-2 text-base font-medium rounded-lg transition-colors duration-150
          {{ $active 
              ? 'bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white' 
              : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">

    {{-- Icon --}}
    <span class="w-6 h-6 text-gray-500 dark:text-gray-400
                 group-hover:text-gray-900 dark:group-hover:text-white 
                 [&_svg]:w-full [&_svg]:h-full [&_svg_path]:fill-current">
        {!! $svg !!}
    </span>

    {{-- Teks --}}
    <span class="ml-3">{{ $title }}</span>
</a>