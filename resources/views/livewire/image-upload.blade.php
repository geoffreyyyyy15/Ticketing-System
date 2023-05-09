<x-form.field >
    @if($image)
    <p class="p-2 m-2 text-lg text-gray-900">Preview</p>
    <div class="flex items-center justify-center">
        @foreach ($image as $im)
            <img src="{{ $im->temporaryUrl() }}" alt="preview_image" class="w-[100px] h-[100px] rounded-full object-cover">
        @endforeach
    </div>
    @endif
    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Profile Picture</label>
<input wire:model='image' name="image" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-300 dark:placeholder-gray-400" id="file_input" type="file" multiple>
</x-form.field>
