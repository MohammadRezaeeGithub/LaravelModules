<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel's Modules</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-6xl container mx-auto px-6 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-xl font-semibold text-gray-800">Laravel's Modules</h1>

            <div class="flex items-center justify-around space-x-5">
                <a href="{{route('users.index')}}">Access Control</a>
                <a href="">Basket</a>
            </div>
        </div>

        @yield('app')

    </div>

</body>
</html>
