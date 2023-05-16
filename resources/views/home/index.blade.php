<x-layout>
<x-sidebar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach (Illuminate\Support\Facades\Schema::getColumnListing('tickets') as $columnName)
                <th scope="col" class="px-6 py-3">
                    {{ $columnName }}
                </th>
                @endforeach
                <th scope="col" class="px-6 py-3">
                    Edit
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Ticket::all() as $ticket)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $ticket->id }}
                </th>
                <td class="px-6 py-4">
                {{ $ticket->user_id }}
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
                {{ $ticket->created_at }}
            </td>
                <td class="px-6 py-4">
                {{ $ticket->updated_at }}
            </td>
                <td class="px-6 py-4">
                <button class="bg-gray-900 p-2 m-2 text-sm text-white">Edit</button>
            </td>
            </tr>
            @endforeach
</tbody>
    </table>
</div>

    </div>
</div>



<script>

    Swal.bindClickHandler()
    Swal.mixin({
    toast: true,
    }).bindClickHandler('data-swal-toast-template')

</script>
</x-layout>
