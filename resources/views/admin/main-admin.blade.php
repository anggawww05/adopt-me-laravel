<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="#" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body class="font-['Poppins']">
    @include('components.navbar-admin')
    @include('components.header-admin')
    <main>
        @yield('container')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
