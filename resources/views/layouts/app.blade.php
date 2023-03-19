
<html>
<head>
    <title>{{ config('app.name') }} | @yield('title', 'Homepage')</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <!-- Alpine v3 -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Focus plugin -->
    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
<div class="container py-24 max-w-2xl mx-auto">
    @yield('content')
</div>
@livewireScripts
@livewire('livewire-ui-modal')
</body>
</html>
