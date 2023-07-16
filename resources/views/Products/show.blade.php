@include('layouts.navigation')
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                <h1 class="text-2xl font-semibold mb-2">Product Detail</h1>

            </div>

        </div>


    </x-slot>
    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <div class="antialiased">
        <div class="py-6">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <div x-data="{ image: 1 }" x-cloak>
                            <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                                <div x-show="image === 1"
                                    class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                    <img src="{{ url('storage/' . $product->image_1) }}" class="w-fit">
                                </div>
                                @if ($product->image_2)
                                    <div x-show="image === 2"
                                        class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                        <img src="{{ url('storage/' . $product->image_2) }}" class="w-fit">
                                    </div>
                                @else
                                    <div x-show="image === 2"
                                        class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                        <img src="https://bodybigsize.com/wp-content/uploads/2020/02/noimage-10.png"
                                            class="w-fit">
                                    </div>
                                @endif

                                @if ($product->image_3)
                                    <div x-show="image === 3"
                                        class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                        <img src="{{ url('storage/' . $product->image_3) }}" class="w-fit">
                                    </div>
                                @else
                                    <div x-show="image === 3"
                                        class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                                        <img src="https://bodybigsize.com/wp-content/uploads/2020/02/noimage-10.png"
                                            class="w-fit">
                                    </div>
                                @endif

                            </div>

                            <div class="flex -mx-2 mb-4">
                                <template x-for="i in 3">
                                    <div class="flex-1 px-2">
                                        <button x-on:click="image = i"
                                            :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }"
                                            class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                            <span x-text="i" class="text-2xl"></span>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                            {{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm"><a href="#"
                                class="text-indigo-600 hover:underline">{{ $product->category->name }}</a></p>

                        <div class="flex items-center space-x-4 my-4">
                            <div>
                                <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                                    <span class="text-indigo-400 mr-1 mt-1">Rp</span>
                                    <span
                                        class="font-bold text-indigo-600 text-3xl">{{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-green-500 text-xl font-semibold">/day</p>
                                <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
                            </div>
                        </div>

                        <p class="text-gray-500">{{ $product->desc }}</p>

                        <form class="space-y-4 text-gray-700" method="post" action="{{ route('order.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="flex py-4 space-x-4">
                                <div class="relative">
                                    <div
                                        class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">
                                        Qty</div>

                                    <select name="qty"
                                        class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                                        @for ($i = 1; $i < 11; $i++)
                                            <option value={{ $i }}>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>

                                    <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                    </svg>
                                </div>

                                <div class="relative">
                                    <div
                                        class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">
                                        Day</div>
                                    <select name="day"
                                        class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                                        @for ($i = 1; $i < 8; $i++)
                                            <option value={{ $i }} name="day">{{ $i }}
                                            </option>
                                        @endfor
                                    </select>

                                    <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                    </svg>
                                </div>

                                <button type="submit"
                                    class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                                    Add to Cart
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
