@include('layouts.navigation')
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                <h1 class="text-2xl font-semibold mb-2">Loan Dashboard</h1>
            </div>
        </div>


    </x-slot>
    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <div class="flex-grow text-gray-800">

        <main class="p-6 sm:p-10 space-y-6">

            <section class="grid md:grid-cols-2 xl:grid-cols gap-6">
                <div class="flex items-center p-8 bg-white shadow rounded-lg">
                    <div
                        class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold">{{ $notReturned->count() }}</span>
                        <span class="block text-gray-500">Loaned Items</span>
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
                        <span class="block text-2xl font-bold">{{ $returned->count() }}</span>
                        <span class="block text-gray-500">Returned Items</span>
                    </div>
                </div>

            </section>

            <div class="w-full h-screen bg-gray-100">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <h1 class="text-3xl font-bolder leading-tight text-gray-900">Loaned Item List</h1>
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
                                                Rent Date
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Qty
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Category
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium"> Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($loans as $loan)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ url('storage/' . $loan->image_1) }}"
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
                                                        {{ $loan->p_name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $loan->rent_date }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <span class="text-sm leading-5 text-gray-900">
                                                        {{ $loan->qty }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                    {{ $loan->c_name }}
                                                <td
                                                    class=" py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                    @if ($loan->is_returned === 0)
                                                        <a
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">
                                                            Not Returned
                                                        </a>
                                                    @else
                                                        <a
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Returned
                                                        </a>
                                                    @endif
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
                                    {{ $loans->links() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </main>
    </div>
</x-app-layout>
