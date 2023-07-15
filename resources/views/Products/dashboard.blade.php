@include('layouts.navigation')
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                <h1 class="text-4xl font-semibold mb-2">Dashboard</h1>
                <h2 class="text-gray-600 ml-0.5">Accessories and Costume Products Here</h2>
            </div>
            <div class="flex flex-wrap items-start justify-end -mb-3">


                <a href="{{ route('product.create') }}"
                    class="inline-flex px-5 py-3 text-white bg-blue-600 hover:bg-purple-700 focus:bg-blue-700 rounded-md ml-6 mb-3">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __('Add New Product') }}
                </a>
            </div>
        </div>


    </x-slot>
    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <div class="flex-grow text-gray-800">

        <main class="p-6 sm:p-10 space-y-6">

            <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold">{{ $products->count() }}</span>
                        <span class="block text-gray-500">Total Products</span>
                    </div>
                </div>
                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold">6.8</span>
                        <span class="block text-gray-500">Average mark</span>
                    </div>
                </div>
                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                        </svg>
                    </div>
                    <div>
                        <span class="inline-block text-2xl font-bold">9</span>
                        <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span>
                        <span class="block text-gray-500">Underperforming students</span>
                    </div>
                </div>
                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold">83%</span>
                        <span class="block text-gray-500">Finished homeworks</span>
                    </div>
                </div>
            </section>

            <div class="w-full h-screen bg-gray-100">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <h1 class="text-3xl font-bolder leading-tight text-gray-900">Product List</h1>
                        </div>

                        <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                            <div
                                class="align-middle inline-block w-full shadow overflow-x-auto sm:rounded-lg border-b border-gray-200">
                                <table class="min-w-full">
                                    <!-- HEAD start -->
                                    <thead>
                                        <tr
                                            class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider">
                                            <th class="px-6 py-3 text-left font-medium">
                                                Thumbnail
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Name
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Price/day
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Qty
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Category
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($products as $product)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ url('storage/' . $product->image_1) }}"
                                                                alt="" />
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $product->name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $product->price }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <span class="text-sm leading-5 text-gray-900">
                                                        {{ $product->qty }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                    {{ $product->category->name }}
                                                </td>
                                                <td
                                                    class="px-6 py-4  whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                                    <a href="{{ route('product.show', $product->id) }}"
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">
                                                        Show
                                                    </a>
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">
                                                        Edit
                                                    </a>

                                                    <form method="POST"
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline"
                                                        action="{{ route('product.destroy', $product->id) }}"
                                                        onsubmit="return confirm('Are you sure want to delete this data?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm ">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                                    colspan="8">
                                                    No Data
                                                </td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                    <!-- BODY end -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </main>
    </div>
</x-app-layout>
