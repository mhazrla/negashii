@include('layouts.navigation')
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                <h1 class="text-2xl font-semibold ">{{ $activity->title }}</h1>
                <h1 class="text-sm font-thin">{{ $activity->date }}</h1>
            </div>
            <div class="mr-6">
            </div>

        </div>


    </x-slot>
    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
                src="{{ url('storage/' . $activity->image1) }}">
            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $activity->subtitle1 }}
                </h1>
                <p class="mb-8 leading-relaxed">{{ $activity->desc1 }}</p>

            </div>
        </div>

        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
            @if ($activity->image2)
                <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
                    src="{{ url('storage/' . $activity->image2) }}">
            @endif
            <div class="text-center lg:w-2/3 w-full">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $activity->subtitle2 }}
                </h1>
                <p class="mb-8 leading-relaxed">{{ $activity->desc2 }}</p>
            </div>
        </div>
    </section>
</x-app-layout>
