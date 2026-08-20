@props(['name'])

@error($name)
    <p {{$attributes->merge(['class' => 'mt-3 text-sm/6 text-red-600 dark:text-red-400'])}}>{{$message}}</p>
@enderror
