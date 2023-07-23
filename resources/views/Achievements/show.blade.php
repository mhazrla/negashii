@include('layouts.navigation')
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                <h1 class="text-2xl font-semibold ">{{ $achievement->title }}</h1>
                <h1 class="text-sm font-thin">{{ $achievement->date }}</h1>
            </div>
            <div class="mr-6">
            </div>

        </div>


    </x-slot>
    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $achievement->title }}
                </h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $achievement->date }}</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="lg:w-1/2 sm:w-1/2 p-4">
                    <div class="flex relative">
                        <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                            src="{{ url('storage/' . $achievement->image1) }}">
                        <div
                            class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $achievement->subtitle1 }}
                            </h1>
                            <p class="leading-relaxed">{{ $achievement->desc1 }}</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 sm:w-1/2 p-4">
                    <div class="flex relative">
                        @if ($achievement->image2)
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="{{ url('storage/' . $achievement->image2) }}">
                        @else
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="https://bodybigsize.com/wp-content/uploads/2020/02/noimage-10.png">
                        @endif
                        <div
                            class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $achievement->subtitle2 }}
                            </h1>
                            <p class="leading-relaxed">{{ $achievement->desc2 }}</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 sm:w-1/2 p-4">
                    <div class="flex relative">
                        @if ($achievement->image3)
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="{{ url('storage/' . $achievement->image3) }}">
                        @else
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="https://bodybigsize.com/wp-content/uploads/2020/02/noimage-10.png">
                        @endif
                        <div
                            class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $achievement->subtitle3 }}
                            </h1>
                            <p class="leading-relaxed">{{ $achievement->desc3 }}</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 sm:w-1/2 p-4">
                    <div class="flex relative">
                        @if ($achievement->image4)
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="{{ url('storage/' . $achievement->image4) }}">
                        @else
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="https://bodybigsize.com/wp-content/uploads/2020/02/noimage-10.png">
                        @endif
                        <div
                            class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $achievement->subtitle4 }}
                            </h1>
                            <p class="leading-relaxed">{{ $achievement->desc4 }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
