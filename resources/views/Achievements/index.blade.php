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
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">OUR ACHIEVEMENTS</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Transform into your favorite character with
                            our high-quality cosplay items. Handcrafted by skilled artisans, our products have been
                            featured in major conventions and loved by cosplayers worldwide.</p>
                    </div>
                    <div class="flex flex-wrap -m-4">
                        @forelse ($achievements as $achievement)
                            <div class="p-4 lg:w-1/4 md:w-1/2">
                                <a href="{{ route('achievement.show', $achievement->id) }}">
                                    <div class="h-full flex flex-col items-center text-center">
                                        <img alt="team"
                                            class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4"
                                            src="{{ url('storage/' . $achievement->image1) }}">
                                        <div class="w-full">
                                            <h2 class="title-font font-medium text-lg text-gray-900">
                                                {{ $achievement->title }}</h2>
                                            <h3 class="text-gray-500 mb-3">{{ $achievement->date }}</h3>
                                            <p class="mb-4">{{ Str::limit($achievement->desc1, 30) }}</p>

                                        </div>
                                    </div>
                                </a>
                            </div>

                        @empty
                            No Achievement here
                        @endforelse

                    </div>
                </div>
            </section>

        </div>

    </x-slot>


</x-app-layout>
