@props(['active' => false])
<a
    class="link-underline text-sm font-medium text-ink/80 dark:text-gray-400 hover:text-ink dark:hover:text-gray-100 {{ $active ? 'after:!w-full' : '' }}"
    aria-current="{{$active ? 'page' : 'false'}}"

    {{$attributes}}
>{{$slot}}</a>
