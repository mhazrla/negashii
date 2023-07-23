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
                <div class="container mx-auto flex px-5 py-10 items-center justify-center flex-col">
                    <img class="lg:w-2/6 md:w-3/6 w-5/6  object-cover object-center rounded" alt="hero"
                        src="{{ url('asset/logo.png') }}">
                    <div class="text-center lg:w-2/3 w-full">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Netai Ga Hoshii</h1>
                        <p class="mb-8 leading-relaxed">Crafting | Performance | Commision Property | Action</p>
                        <h1 class="title-font sm:text-xl text-2xl mb-1 font-medium text-red-500">Cosplay Team By</h1>
                        <h1 class="title-font font-bold sm:text-2xl text-2xl mb-4  text-gray-900">Shinchi
                            Kousen
                            Shinzoku</h1>
                        {{-- <div class="flex justify-center">
                            <button
                                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                            <button
                                class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                        </div> --}}
                    </div>
                </div>
            </section>
        </div>


        <div class="relative isolate px-6 pt-6 lg:px-8">

            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#1b01ff] to-[#00ff37] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            {{-- About  --}}
            <section class="text-gray-600 body-font border-y-2">
                <div class="container px-5 py-24 mx-auto ">
                    <div class="flex flex-col text-center w-full mb-20 ">

                        <h1 class="text-indigo-500 sm:text-4xl text-3xl tracking-widest font-medium title-font mb-4">
                            About
                            Team</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base"><span class="text-red-500 font-bold">
                                Negashii /
                                Netai Ga
                                Hoshii Cosplay Team</span>
                            adalah sebuah team cosplay yang berasal dari komunitas Shinci Kousen Shinzoku / SKS Cosplay
                            Cirebon
                    </div>
                    <div class="flex flex-wrap justify-center">
                        <div class="xl:w-1/3 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                            <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Tujuan</h2>
                            <p class="leading-relaxed text-base mb-4">Menjadi Wadah bagi para cosplayeer yang memiliki
                                minat untuk berkembang dan menambah skill baik dari segi Costume Making Performance</p>

                        </div>
                        <div class="xl:w-1/3 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                            <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Tahun Kelahiran
                            </h2>
                            <p class="leading-relaxed text-base mb-4">Negashii Cosplay Team terbentuk pada tanggal <span
                                    class="font-bold text-green-500"> 26 September 2022.</span> Dengan harapan dapat
                                membangkitkan
                                kembali
                                Cosplay Performance di kota Cirebon</p>

                        </div>
                        <div class="xl:w-1/3 lg:w-1/2 md:w-full px-8 py-6 border-x-2 border-gray-200 border-opacity-60">
                            <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">Harfiah</h2>
                            <p class="leading-relaxed text-base mb-4">Berasal dari kata <span
                                    class="text-purple-600 font-bold">Netai Ga Hoshii</span>, yang artinya ingin
                                tidur/PengenTuru, seperti nama sebelumnya. Karena biasanya para member berlatih skill
                                mereka saat di malam hari. xD</p>
                        </div>

                    </div>
                </div>
            </section>


        </div>

        <div class="relative isolate px-6 pt-6 lg:px-8">

            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#5dc244] to-[#ffee00] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            {{-- Visi Misi --}}
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                        <h1 class="text-indigo-500 sm:text-4xl text-3xl tracking-widest font-medium title-font mb-4">
                            Visi & Misi Team</h1>
                        <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Menciptakan Team Cosplay Performance
                            yang kreatif</p>
                    </div>
                    <div class="flex flex-wrap -m-4">
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Wadah bagi para Cosplayer
                                </h2>
                                <p class="leading-relaxed text-base">Menciptakan wadah bagi para cosplayer sehingga
                                    dapat memaksimalkan potensi dalam keahlian masing-masing di dunia cosplay</p>
                            </div>
                        </div>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <circle cx="6" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                                    </svg>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Aktif</h2>
                                <p class="leading-relaxed text-base">Ikut berperan aktif dalam perkembangan cosplay
                                    untuk menciptakan lingkungan yang positif</p>
                            </div>
                        </div>
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                            <div class="border border-gray-200 p-6 rounded-lg">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Sarana Pembelajaran</h2>
                                <p class="leading-relaxed text-base">Menjadi sarana pembelajaran untuk meningkatkan
                                    kemampuan di dalam dunia cosplay</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section>

        </div>
    </x-slot>


</x-app-layout>
