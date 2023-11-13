<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        canvas {
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>
<body class="bg-gray-200">
    @include('sweetalert::alert')
    <div class="p-8">
        <x-nav></x-nav>
    {{$slot}}
    </div>
</body>
</html>