<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel's Modules</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">


    <div class="shadow-xl mb-5">
        <div class="flex justify-between items-center container mx-auto py-6">
                            <!-- Header -->
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-800 mr-3">Laravel's Modules</h1>

                        <div class="flex items-center justify-around space-x-5 ml-7">
                            <a href="{{route('users.index')}}">Access Control</a>
                            <a href="{{route('products.index')}}">Basket</a>
                        </div>
                    </div>

                    <p class=" cursor-pointer ">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6">
                        <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835L5.76 7.5m0 0L7.5 15h9.75m-11.49-7.5h13.74c.414 0 .707.403.58.798l-1.632 5.438a.75.75 0 01-.72.514H7.5m0 0L5.106 5.165M7.5 15a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm9 0a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
                        </svg>
                    </p>
        </div>
    </div>

    <div class="container mx-auto pt-5">
        @yield('app')
    </div>

</body>
</html>
