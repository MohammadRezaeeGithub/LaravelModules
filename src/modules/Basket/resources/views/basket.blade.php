@extends('app')
@section('app')
 <!-- 2 Column Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- RIGHT: Action Panel -->
                <div class="rounded-xl p-6">
                    @include('BasketViews::summary')

                    <button
                        class="w-full mt-4 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                        Place Order
                    </button>
                </div>


            <!-- LEFT: Table -->
            <div class="md:col-span-2">
                    <div class="overflow-x-auto bg-white shadow rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">
                                        Product Name
                                    </th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">
                                        Unit Price
                                    </th>
                                    <th class="px-6 py-3 text-left font-semibold text-gray-700">
                                        Quantity
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="px-6 py-4">
                                           {{ $item->title }}
                                        </td>

                                        <td class="px-6 py-4">
                                            ${{ number_format($item->price) }}
                                        </td>

                                        <td class="px-6 py-4 ">
                                            {{ $item->quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
@endsection
