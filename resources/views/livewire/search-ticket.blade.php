<div>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" wire:model='search' class="bg-white text-black shadow-xl  pl-8 m-2 rounded-lg" placeholder="Search">  
        
        
    </div>
    <h1>Search Results:</h1>



    <ul>

        @foreach($tickets as $ticket)

            <li>{{ $ticket->title }}</li>

        @endforeach

    </ul>

</div>
