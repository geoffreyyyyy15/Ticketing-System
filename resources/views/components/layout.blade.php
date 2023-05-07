<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticketing System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')

    <livewire:styles />

    
</head>
<body class="bg-gradient-to-r from-gray-500 to-white h-screen">

    
    {{ $slot }}

    <livewire:scripts />
</body>
</html>