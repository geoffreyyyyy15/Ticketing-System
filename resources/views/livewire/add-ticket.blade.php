<div>
    <div  class="flex justify-center text-center items-center m-2">
        <button data-modal-target="add-new-ticket-modal" data-modal-toggle="add-new-ticket-modal" type="submit" class="text-white w-full bg-[#24292F] sticky bottom-0 left-0 hover:translate-x-0 hover:scale-90 transition-all hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
            <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mr-2">
                <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"></path>
            </svg>
            Add Ticket
        </button>
    </div>


    <!-- Main modal -->
    <div wire:ignore.self id="add-new-ticket-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div  class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new Ticket</h3>
                        <div class="">
                            <form wire:prevent.submit='add' class="grid grid-cols-2 gap-4 mb-2" method="post">
                                @csrf
                                <div>
                                    <x-input model="title" name="title" />
                                </div>
                                <div class="mt-1">
                                    <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Priority</label>
                                    <select wire:model="priority" class="dark:bg-gray-700 p-2 text-gray-300 text-sm rounded-lg" name="" id="">
                                        <option disabled selected>Priority</option>
                                        <option value="1">Low</option>
                                        <option value="2">Immediate</option>
                                        <option value="3">Urgent</option>
                                    </select>
                                </div>
                            </div>
                            <x-textarea model="description" label="description" />
                        </form>
                        <div class="flex justify-center items-center m-2">
                            <button wire:click='add()' wire:loading.attr="disabled" type="button" class="text-white bg-[#24292F] hover:translate-x-0 hover:scale-110 transition-all hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
                                Add
                            </button>
                        </div>
                        <div class="flex justify-center items-center">
                            <div wire:loading wire:target='add'>
                                <div class="px-3 py-1 text-xs font-medium leading-none text-center text-blue-800 bg-blue-200 rounded-full animate-pulse dark:bg-blue-900 dark:text-blue-200">loading...</div>
                            </div>
                            <x-flash />
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
