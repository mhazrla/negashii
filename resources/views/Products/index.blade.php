<x-app-layout>
    <x-slot name="header">
        <div class="relative isolate px-6 pt-6 lg:px-8">
            @include('layouts.navigation')

            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff0000] to-[#ff1d68] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            <section class="text-gray-600 body-font">
                {{-- Top Selling --}}

                <div class="container px-5 py-24 mx-auto">
                    <h2 class="my-6 text-3xl font-semibold text-gray-700 dark:text-gray-200">
                        {{ __($sales->count() . ' Best Selling Products') }}
                    </h2>
                    <div class="flex flex-wrap -m-4">
                        @forelse ($sales as $product)
                            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                <a class="block relative h-48 rounded overflow-hidden"
                                    href="{{ route('product.show', $product->id) }}">
                                    <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                        src="{{ url('storage/' . $product->image_1) }}">
                                </a>
                                <div class="mt-4">
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                        {{ $product->category->name }}</h3>
                                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                                    <p class="mt-1">Rp{{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>
                        @empty
                            No Product here
                        @endforelse
                    </div>
                </div>
            </section>

            {{-- Products --}}
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <h2 class="my-6 text-3xl font-semibold text-gray-700 dark:text-gray-200">
                        {{ __('Our Products') }}
                    </h2>
                    <div class="flex flex-wrap -m-4">
                        @forelse ($products as $product)
                            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                <a class="block relative h-48 rounded overflow-hidden"
                                    href="{{ route('product.show', $product->id) }}">
                                    <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                        src="{{ url('storage/' . $product->image_1) }}">
                                </a>
                                <div class="mt-4">
                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                        {{ $product->category->name }}</h3>
                                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                                    <p class="mt-1">Rp{{ number_format($product->price, 2) }}</p>
                                </div>
                            </div>
                        @empty
                            No Product here
                        @endforelse
                    </div>
                </div>
            </section>

        </div>

    </x-slot>


</x-app-layout>
