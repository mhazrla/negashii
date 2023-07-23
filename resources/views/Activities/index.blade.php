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
                    <div class="flex flex-wrap w-full mb-20">
                        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Activities
                            </h1>
                            <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                        </div>
                        <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Our ongoing or past activities</p>
                    </div>
                    <div class="flex flex-wrap -m-4">
                        @forelse ($activities as $activity)
                            <div class="xl:w-1/4 md:w-1/2 p-4">
                                <a href="{{ route('activity.show', $activity->id) }}">
                                    <div class="bg-gray-100 p-6 rounded-lg">
                                        <img class="h-40 rounded w-full object-cover object-center mb-6"
                                            src="{{ url('storage/' . $activity->image1) }}" alt="content">
                                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                            {{ $activity->date }}</h3>
                                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                                            {{ $activity->title }}
                                        </h2>
                                        <p class="leading-relaxed text-base">{{ Str::limit($activity->desc1, 50) }}</p>
                                    </div>
                                </a>
                            </div>
                        @empty
                            No Activity here
                        @endforelse


                    </div>
                </div>
            </section>

        </div>

    </x-slot>


</x-app-layout>
