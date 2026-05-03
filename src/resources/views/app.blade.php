<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-6xl mx-auto px-6 py-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-xl font-semibold text-gray-800">Laravel's Modules</h1>
        </div>

        <!-- 2 Column Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- RIGHT: Action Panel -->
                <div class="rounded-xl p-6">
                    <a href="{{route('users.index')}}"
                    class="block w-full text-center bg-gray-500 text-amber-100  py-5 rounded-lg text-sm font-medium
                             hover:bg-gray-800 hover:text-amber-50 transition mb-2">
                        User List
                    </a>
                    <a href="{{route('roles.index')}}"
                    class="block w-full text-center bg-gray-500 text-amber-100  py-5 rounded-lg text-sm font-medium
                             hover:bg-gray-800 hover:text-amber-50 transition mb-2">
                        Role list
                    </a>
                </div>


            <!-- LEFT: Table -->
            <div class="md:col-span-2">
                @yield('content')
            </div>


        </div>

    </div>

</body>
</html>
