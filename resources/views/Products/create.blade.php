@include('layouts.navigation')

<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Add New Product') }}
        </h2>

    </x-slot>

    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form class="space-y-4 text-gray-700" method="post" action="{{ route('product.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            {{-- Name --}}
                            <div class="w-full px-2 md:w-1/2">
                                <label class="block mb-1" for="formGridCode_card">Product Name <span
                                        class="text-red-600 text-sm">*</span></label>
                                <input name="name" placeholder="Product Name" value="{{ old('name') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="text" />
                                <div class="my-2 ">
                                    @error('name')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-full px-2 md:w-1/2">
                                <label for="category_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Category<span
                                        class="text-red-600 text-sm">*</span></label>
                                <select id="category_id" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="" disabled>Choose category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == old('category')) selected @endif>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>

                                <div class="my-2 ">
                                    @error('category_id')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label class="block mb-1" for="formGridCode_card">Quantity<span
                                            class="text-red-600 text-sm">*</span></label>
                                    <input name="qty" placeholder="10" value="{{ old('qty') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="number" min="0" />
                                    <div class="my-2 ">
                                        @error('qty')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/2">
                                <div class="mb-6">
                                    <label class="block mb-1" for="formGridCode_card">Price/day<span
                                            class="text-red-600 text-sm">*</span></label>
                                    <input name="price" placeholder="200000" value="{{ old('price') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="number" min="0" />
                                    <div class="my-2 ">
                                        @error('price')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
                            <div class="w-full px-2 md:w-1/3">
                                <div class="mb-6">
                                    <label for="image_1" class="block mb-2 text-sm font-medium ">Thumbnail<span
                                            class="text-red-600 text-sm">*</span></label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="image_1" type="file" name="image_1">

                                    <div class="my-2 ">
                                        @error('image_1')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/3">
                                <div class="mb-6">
                                    <label for="image_2" class="block mb-2 text-sm font-medium ">Image 2</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="image_2" type="file" name="image_2">

                                    <div class="my-2 ">
                                        @error('image_2')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-2 md:w-1/3">
                                <div class="mb-6">
                                    <label for="image_3" class="block mb-2 text-sm font-medium ">Image 3</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="image_3" type="file" name="image_3">

                                    <div class="my-2 ">
                                        @error('image_3')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <label class="block mb-1" for="formGridCode_card">Description<span
                                        class="text-red-600 text-sm">*</span></label>
                                <textarea id="desc" name="desc" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean varius pulvinar mauris ut vulputate. Praesent pretium metus eget blandit consequat. Maecenas malesuada sapien nec sagittis molestie. Ut neque purus, scelerisque quis tellus quis, ultricies venenatis lectus. Sed volutpat sapien blandit metus auctor, at ultricies mi pretium. Morbi eu aliquet enim. Proin ac egestas lectus. ">{{ old('desc') }}</textarea>
                                <div class="my-2 ">
                                    @error('desc')
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
