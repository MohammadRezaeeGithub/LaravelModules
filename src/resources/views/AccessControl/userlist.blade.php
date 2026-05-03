@extends('app')

@section('content')

                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                    <div class="px-6 py-4 border-b bg-gray-50 text-gray-700 font-medium">
                        User List
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">

                            <thead class="text-gray-500">
                                <tr class="border-b">
                                    <th class="px-6 py-3 font-medium">Name</th>
                                    <th class="px-6 py-3 font-medium">Email</th>
                                    <th class="px-6 py-3 font-medium">Roles</th>
                                    <th class="px-6 py-3 font-medium">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 text-gray-800">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-6 py-4">
                                            @foreach ($user->roles as $role)
                                                <span class="bg-gray-800 text-white text-xs px-3 py-1 rounded-full mr-1">
                                                    {{ $role->name }}
                                                </span>
                                            @endforeach
                                        </td>

                                        <td class="px-6 py-4">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-blue-600 hover:text-blue-800 font-medium">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
@endsection

