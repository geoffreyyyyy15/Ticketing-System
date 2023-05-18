<form wire:submit.prevent='submit' method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
    @csrf
    <h2 class="mb-2 text-center">Sign Up</h2>
    <a href="{{ route('login') }}">
        <h2 class="mb-2 text-center text-gray-400">Already have an account?</h2>
    </a>
    <hr class="mb-4 bg-gray-500">
<x-form.input

        name="email"
        type="email" wire:model.debounce.500ms='email' />
<x-form.input name="name"  wire:model.debounce.500ms='name' />
<x-form.input name="username" wire:model.debounce.500ms='username' />
<x-form.field >
    @if(!$images)
    <x-loading target="image" />
    @endif
    @if($images)
    <p class="p-2 m-2 text-lg text-gray-900">Preview</p>
    <div class="flex items-center justify-center">
        @foreach ($images as $im)
        <x-loading target="image" />
        <img src="{{ $im->temporaryUrl() }}" alt="preview_image" class="w-[100px] h-[100px] rounded-full object-cover">
        @endforeach
    </div>
    @endif
    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Profile Picture</label>
    <input wire:model='images' name="images" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-300 dark:placeholder-gray-400" id="file_input" type="file" multiple>
    @error('image')
    <p class="text-red-500 text-sm p-2 m-2">{{ $message }}</p>
    @enderror
</x-form.field>

<x-form.input name="password" type="password" wire:model.debounce.500ms='password' />
<x-form.input name="password_confirmation" type="password" wire:model.debounce.500ms='password_confirmation' />
<x-form.button >Sign in</x-form.button>
<div class="flex items-center my-4">
    <hr class="flex-grow border-gray-300">
    <span class="mx-4 text-gray-500 ">Or</span>
    <hr class="flex-grow border-gray-300">
    </div>
<div class="flex items-center justify-center">
    <button type="button" class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2">
        <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
        Sign in with Google
    </button>
</div>
</form>
