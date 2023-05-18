<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach ($tickets_columns as $columnName)
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
        @foreach ($tickets as $ticket)
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

                <button data-swal-template="#my-template">
                    Remove Ticket
                </button>

            <template id="my-template">
                <swal-title>
                    Confirm Deletion?
                </swal-title>
                <swal-icon type="warning" color="red"></swal-icon>
                <form action="{{ route('ticket.delete', ['ticket' => $ticket]) }}" method="post">
                    @method('DELETE')
                    @csrf
                        <swal-button type="confirm">
                            Confirm
                        </swal-button>
                    </form>
                <swal-button type="cancel">
                    Cancel
                </swal-button>
                <swal-param name="allowEscapeKey" value="false" />
                <swal-param
                    name="customClass"
                    value='{ "popup": "my-popup" }' />
                    <swal-function-param
                    name="didOpen"
                    value="popup => console.log(popup)" />
            </template>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="m-5">
    {{ $tickets->links() }}
</div>