<div class="flex justify-center items-center m-2">
    <div class="flex justify-center items-center m-2">
        <button wire:click='increment' type="button" class="text-white bg-[#24292F] hover:translate-x-0 hover:scale-110 transition-all hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
        +
        </button>
    </div>
    <p class="text-gray-900 text-lg">{{ $count }}</p>
    <button wire:click='decrement' type="button" class="ml-4 text-white bg-[#24292F] hover:translate-x-0 hover:scale-110 transition-all hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
        -
        </button>
</div>
