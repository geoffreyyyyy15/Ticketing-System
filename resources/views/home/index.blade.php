<x-layout>
<x-sidebar />
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <livewire:search-ticket />
    <livewire:add-ticket />
  <livewire:tickets-table />
  
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
