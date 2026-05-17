@extends('app')
@section('app')
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
@endsection
