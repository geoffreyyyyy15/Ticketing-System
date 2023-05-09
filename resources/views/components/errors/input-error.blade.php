@props(['name'])
@error($name)
    <p class=" text-sm text-red-500 transition-all hover:translate-x-3 hover:scale-110">{{ $message }}</p>
@enderror
