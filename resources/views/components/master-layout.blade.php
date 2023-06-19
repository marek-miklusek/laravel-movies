<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoviesFun</title>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flowbite.min.js'])
    <livewire:styles>
</head>
<style>
    [x-cloak] { display: none !important; }
</style>
<body class="{{ Request::segment(1) ?: 'home' }} bg-black">

    <x-navigation />

    {{ $slot }}

    <x-flash-message />

    <x-footer />
    
    <x-script-rating />
    <x-progress-bar />
    <livewire:scripts>
    @include('popper::assets')
</body>
</html>