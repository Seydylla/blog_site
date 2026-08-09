@props(['active' => false])

<a
    class="link-underline text-sm font-medium text-ink/80 hover:text-ink {{ $active ? 'after:!w-full' : '' }}"
    aria-current="{{$active ? 'page' : 'false'}}"

    {{$attributes}}
>{{$slot}}</a>
