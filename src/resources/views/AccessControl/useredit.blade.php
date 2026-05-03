@extends('app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-xl font-semibold text-gray-800">
            Edit User: {{ $user->name }}
        </h1>

        <a href="{{ route('users.index') }}"
           class="border border-gray-300 text-blue-600 px-4 py-2 rounded-lg text-sm
                  hover:bg-blue-50 transition">
            User List
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 space-y-8">

        <!-- Form -->
        <form method="POST" action="{{route('users.update',$user->id)}}">
            @csrf

            <!-- Roles -->
                <div>
                    <h2 class="text-gray-700 font-medium mb-3">Roles</h2>

                    <div class="flex flex-wrap gap-4">
                        @foreach ($roles as $role)
                            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                <input type="checkbox"
                                    name="roles[]"
                                    value="{{ $role->name}}"
                                    {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded">

                                {{ $role->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

            <!-- Divider -->
            <div class="border-t my-6"></div>

            <!-- Permissions (optional if you have them) -->
            @isset($permissions)
                <div>
                    <h2 class="text-gray-700 font-medium mb-3">Permissions</h2>

                    <div class="flex flex-wrap gap-4">
                        @foreach ($permissions as $permission)
                            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                <input type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission->name }}"
                                    {{$user->permissions->contains($permission->id) ? 'checked' : ''}}
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded">

                                {{ $permission->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endisset

            <!-- Submit -->
            <div class="flex justify-end pt-6">
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium
                               hover:bg-blue-700 transition">
                    Update User
                </button>
            </div>

        </form>

    </div>

@endsection
