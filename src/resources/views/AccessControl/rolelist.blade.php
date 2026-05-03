@extends('app')
@section('content')
<div class="space-y-6">

    <!-- Add Role Card -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50 text-gray-700 font-medium">
            Add Role
        </div>

        <div class="p-6">
            <form method="POST" action="">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">

                    <!-- Role Name -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">
                            Role Name
                        </label>
                        <input type="text" name="name"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring focus:ring-blue-100 focus:border-blue-400"
                               placeholder="admin">
                    </div>

                    <!-- Submit -->
                    <div>
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-2.5 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                            Add
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>


    <!-- Roles List -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b bg-gray-50 text-gray-700 font-medium">
            Roles List
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">

                <thead class="text-gray-500">
                    <tr class="border-b">
                        <th class="px-6 py-3 font-medium">Role Name</th>
                        <th class="px-6 py-3 font-medium">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($roles as $role)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-800">
                                {{ $role->name }} 
                            </td>

                            <td class="px-6 py-4">
                                <a href=""
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                No roles found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
