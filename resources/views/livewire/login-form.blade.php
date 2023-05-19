<form wire:submit.prevent='login' method="post">
    @csrf
    <h2 class="mb-2 text-center">Sign In</h2>
    <div class="flex items-center my-4">
        <hr class="flex-grow border-gray-300">
        <span class="mx-4 text-gray-500 ">Or</span>
        <hr class="flex-grow border-gray-300">
        </div>
    <a href="{{ route('register') }}">
        <h2 class="mb-2 text-center transition-all hover:scale-110 hover:text-gray-700">Sign Up here</h2>
        </a>
        <div class="flex justify-center items-center">
           <x-loading target="login" />
    </div>
    <x-form.input name="email" wire:model.debounce.500ms='email' type="email" />
    <x-form.input name="password" wire:model.debounce.500ms='password' type="password" />
    <x-form.button>Login</x-form.button>


</form>
