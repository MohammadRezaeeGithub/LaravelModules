@extends('AccessControl::layout')
@section('content')
<div class="space-y-6">

    <!--  Card -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50 text-gray-700 font-medium">
            Edit Role
        </div>

        <div class="p-6">
            <form method="POST" action="{{route('roles.update',$role->id)}}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">

                    <!-- Role Name -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">
                            Role Name
                        </label>
                        <input type="text" name="name"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-100 focus:border-blue-400"
                               placeholder="admin" value="{{$role->name}}" readonly>
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
                                    {{$role->permissions->contains($permission->id) ? 'checked' : ''}}
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
                    Update Role
                </button>
            </div>
            </form>
        </div>
    </div>

</div>

@endsection
