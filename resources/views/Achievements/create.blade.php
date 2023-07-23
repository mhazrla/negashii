@include('layouts.navigation')

<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Add New Achievement') }}
        </h2>

    </x-slot>

    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form class="space-y-4 text-gray-700" method="post" action="{{ route('achievement.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label class="block mb-1" for="title">Title<span
                                            class="text-red-600 text-sm">*</span></label>
                                    <input name="title" placeholder="Achievement Title" value="{{ old('title') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="text" />
                                    <div class="my-2 ">
                                        @error('title')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label class="block mb-1" for="date">Date<span
                                            class="text-red-600 text-sm">*</span></label>
                                    <input name="date" value="{{ old('date') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="date" />
                                    <div class="my-2 ">
                                        @error('date')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>
                        {{-- Article 1 --}}
                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="subtitle1" class="block mb-2 text-sm font-medium ">Subtitle 1<span
                                            class="text-red-600 text-sm">*</span></label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="subtitle1" type="text" name="subtitle1" placeholder="Subtitle 1"
                                        value="{{ old('subtitle1') }}">

                                    <div class="my-2 ">
                                        @error('subtitle1')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="image1" class="block mb-2 text-sm font-medium ">Image 1<span
                                            class="text-red-600 text-sm">*</span></label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="image1" type="file" name="image1">

                                    <div class="my-2 ">
                                        @error('image1')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <label class="block mb-1" for="desc1">Description 1<span
                                        class="text-red-600 text-sm">*</span></label>
                                <textarea id="desc1" name="desc1" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean varius pulvinar mauris ut vulputate. Praesent pretium metus eget blandit consequat. Maecenas malesuada sapien nec sagittis molestie. Ut neque purus, scelerisque quis tellus quis, ultricies venenatis lectus. Sed volutpat sapien blandit metus auctor, at ultricies mi pretium. Morbi eu aliquet enim. Proin ac egestas lectus. ">{{ old('desc1') }}</textarea>
                                <div class="my-2 ">
                                    @error('desc1')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Article 2 --}}
                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="subtitle3" class="block mb-2 text-sm font-medium ">Subtitle 2</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="subtitle2" type="text" name="subtitle2" placeholder="Subtitle 2"
                                        value="{{ old('subtitle2') }}">

                                    <div class="my-2 ">
                                        @error('subtitle2')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="image2" class="block mb-2 text-sm font-medium ">Image 2</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="image2" type="file" name="image2">

                                    <div class="my-2 ">
                                        @error('image2')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <label class="block mb-1" for="desc2">Description 2</label>
                                <textarea id="desc2" name="desc2" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean varius pulvinar mauris ut vulputate. Praesent pretium metus eget blandit consequat. Maecenas malesuada sapien nec sagittis molestie. Ut neque purus, scelerisque quis tellus quis, ultricies venenatis lectus. Sed volutpat sapien blandit metus auctor, at ultricies mi pretium. Morbi eu aliquet enim. Proin ac egestas lectus. ">{{ old('desc2') }}</textarea>
                                <div class="my-2 ">
                                    @error('desc2')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Article 3 --}}
                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="subtitle3" class="block mb-2 text-sm font-medium ">Subtitle 3</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="subtitle3" type="text" name="subtitle3" placeholder="Subtitle 3"
                                        value="{{ old('subtitle3') }}">

                                    <div class="my-2 ">
                                        @error('subtitle3')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="image3" class="block mb-2 text-sm font-medium ">Image 3</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="image3" type="file" name="image3">

                                    <div class="my-2 ">
                                        @error('image3')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <label class="block mb-1" for="desc3">Description 3</label>
                                <textarea id="desc3" name="desc3" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean varius pulvinar mauris ut vulputate. Praesent pretium metus eget blandit consequat. Maecenas malesuada sapien nec sagittis molestie. Ut neque purus, scelerisque quis tellus quis, ultricies venenatis lectus. Sed volutpat sapien blandit metus auctor, at ultricies mi pretium. Morbi eu aliquet enim. Proin ac egestas lectus. ">{{ old('desc3') }}</textarea>
                                <div class="my-2 ">
                                    @error('desc3')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Article 4 --}}
                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="subtitle4" class="block mb-2 text-sm font-medium ">Subtitle 4</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="subtitle4" type="text" name="subtitle4" placeholder="Subtitle 4"
                                        value="{{ old('subtitle4') }}">

                                    <div class="my-2 ">
                                        @error('subtitle4')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label for="image4" class="block mb-2 text-sm font-medium ">Image 4</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="image4" type="file" name="image4">

                                    <div class="my-2 ">
                                        @error('image4')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <label class="block mb-1" for="desc4">Description 4</label>
                                <textarea id="desc4" name="desc4" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean varius pulvinar mauris ut vulputate. Praesent pretium metus eget blandit consequat. Maecenas malesuada sapien nec sagittis molestie. Ut neque purus, scelerisque quis tellus quis, ultricies venenatis lectus. Sed volutpat sapien blandit metus auctor, at ultricies mi pretium. Morbi eu aliquet enim. Proin ac egestas lectus. ">{{ old('desc4') }}</textarea>
                                <div class="my-2 ">
                                    @error('desc4')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <button type="submit"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </div>




</x-app-layout>
