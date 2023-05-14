<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticketing System</title>
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @include('sweetalert::alert')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
    <livewire:styles />


</head>
<body class="h-screen bg-gradient-to-r from-gray-500 to-white">


    {{ $slot }}

    <livewire:scripts />
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>
</html>
