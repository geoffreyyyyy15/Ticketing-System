<div>
  
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="dark:bg-gray-700 text-xs text-gray-900 uppercase dark:text-gray-400">
            <tr>
            @foreach ($ticketsColumn as $ticket_column)     
                <th scope="col" class="px-6 py-3">
                    {{ $ticket_column }}
                </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)  
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $ticket->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $ticket->sender->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->title }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->description }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->priority }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->created_at->diffForHumans() }}
                </td>
                <td class="px-6 py-4">
                    {{ $ticket->updated_at  ->diffForHumans() }}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<div class="mt-5">
    {{ $tickets->links() }}
</div>
</div>
