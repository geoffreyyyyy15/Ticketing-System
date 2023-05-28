    <div wire:poll.1s>
        <table class="w-full text-sm text-left text-gray-500 shadow-lg dark:shadow-white dark:text-gray-400 hover:shadow-lg hover:dark:shadow-black transition-all rounded-lg">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-100 dark:text-gray-800">
                <tr>
            @foreach ($tickets_columns as $columnName)
            <th scope="col" class="px-6 py-3">
                {{ $columnName == 'user_id' ? 'User' : $columnName }}
            </th>
            @endforeach
            <th scope="col" class="px-6 py-3">
                Edit
            </th>
            <th scope="col" class="px-6 py-3">
                Delete Ticket
            </th>
        </tr>
    </thead>
    <tbody>
        @if ($tickets->count() > 0)

        @foreach ($tickets as $ticket)
        <tr class="bg-white border-b dark:bg-white dark:border-gray-700 dark:text-gray-900">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                {{ $ticket->id }}
            </th>
            <td class="px-6 py-4">
                {{ $ticket->sender->name }}
            </td>
            <td class="px-6 py-4">
                {{ $ticket->title }}
            </td>
            <td class="px-6 py-4 ">
                {{ $ticket->description }}
            </td>
            <td class="px-6 py-4">
                @php
                $priorities = [
                    3 => ['class' => 'dark:bg-red-500 p-2 dark:text-white rounded', 'label' => 'Urgent'],
                    2 => ['class' => 'dark:bg-yellow-500 p-2 dark:text-white rounded', 'label' => 'Immediate'],
                    1 => ['class' => 'dark:bg-green-500 p-2 dark:text-white rounded', 'label' => 'Low'],
                ];
                @endphp

@if ($priority = $priorities[$ticket->priority] ?? null)
<p class="{{ $priority['class'] }} text-center">
    {{ $priority['label'] }}
</p>
@endif
</td>

<td class="px-6 py-4">
    {{ $ticket->created_at->diffForHumans() }}
</td>
<td class="px-6 py-4">
    {{ $ticket->updated_at->diffForHumans() }}
</td>
<td class="px-6 py-4">


    
    <!-- Modal toggle -->
    <button wire:click='changeUpdate({{ $ticket->id }}, {{ $ticket->user_id }})' data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Edit
    </button>
    
    <!-- Main modal -->
    <div wire:ignore.self id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div  class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Ticket</h3>
                    <div class="">
                        <form wire:prevent.submit='update' class="grid grid-cols-2 gap-4 mb-2" method="post">
                            @csrf
                            <div>
                                <x-input model="title" name="title" />
                            </div>
                            <div class="mt-1">
                                <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Priority</label>
                                <select wire:model="priority" class="dark:bg-gray-700 p-2 text-gray-300 text-sm  rounded-lg" name="" id="">
                                    <option disabled>Priority</option>
                                    <option value="1" selected>Low</option>
                                    <option value="2">Immediate</option>
                                    <option value="3">Urgent</option>
                                </select>
                            </div>
                        </div>
                        <x-textarea model="description" label="description" />
                        </form>
                        <div class="flex justify-center items-center m-2">
                            <button wire:click='update()' type="button" class="text-white bg-[#24292F] hover:translate-x-0 hover:scale-110 transition-all hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
                                Update
                            </button>
                        </div>
                        <div class="flex justify-center items-center">
                            <div wire:loading wire:target='update'>
                                <div class="px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">loading...</div>
                            </div>
                            <x-flash />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
        <td class="px-6 py-4">
            
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" wire:click='changeDelete({{ $ticket->id }})'  data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-blue-800" type="button">
                Delete
            </button>
            <div wire:ignore.self id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                            <button wire:click='delete()' data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div wire:loading wire:target='delete'>
    <div class="px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">loading...</div>
</div>
@else
<h1 class="text-black text-lg text-center">No Tickets Found</h1>
@endif
</div>


<div class="mt-5 mb-5 p-2">
    {{ $tickets->links() }}
</div>
</div>
