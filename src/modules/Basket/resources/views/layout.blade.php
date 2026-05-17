@extends('app')
@section('app')
<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-7xl mx-auto px-4">

        <div class="grid gap-6
                    grid-cols-1
                    sm:grid-cols-2
                    md:grid-cols-3
                    lg:grid-cols-4
                    xl:grid-cols-5">

            @foreach ($products as $product)

                <div class="bg-white rounded-sm shadow overflow-hidden border border-gray-200">

                    <!-- Image -->
                    <div class="p-4">
                        <img
                            src="img/noimage.png"
                            class="w-full h-[240px] object-cover rounded-sm"
                        >
                    </div>

                    <!-- Content -->
                    <div class="px-5 pb-6">

                        <!-- Title -->
                        <h2 class="text-2xl leading-none font-bold text-[#6B2D2D] mb-4">
                            {{ $product->title }}
                        </h2>

                        <!-- Price -->
                        <div class="flex items-center gap-3 mb-4">

                            <span class="text-2xl font-bold text-black">
                                ${{ $product->price }}
                            </span>
                        </div>

                        <!-- Description -->
                        <p class="text-sm leading-7 text-gray-500 mb-6 line-clamp-4">
                            {{ $product->description }}
                        </p>

                        <!-- Button -->
                        <button
                            class="w-full py-3 border-2 border-[#B28A8A]
                                   rounded-full text-[#7B4B4B]
                                   text-sm tracking-wide font-semibold
                                   hover:bg-[#7B4B4B]
                                   hover:text-white transition">

                            Add to cart

                        </button>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>
@endsection
