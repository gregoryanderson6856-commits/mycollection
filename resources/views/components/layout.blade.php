<!DOCTYPE html>
<html lang="en" data-theme="halloween">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<head> </head>

<body>
    <x-nav-bar />
    <x-flash-messages />
    <x-header-logged-in />
    {{ $slot }}

    <x-footer />
</body>
</html>
