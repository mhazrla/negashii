@include('layouts.navigation')
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                <h1 class="text-2xl font-semibold ">My Items</h1>
            </div>

        </div>


    </x-slot>
    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <div class="flex-grow text-gray-800">

        <main class="p-6 sm:p-10 space-y-6">
            <div class="w-full h-screen bg-gray-100">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex flex-col">
                        <div class="mb-4">
                            <h1 class="text-3xl font-bolder leading-tight text-gray-900">Item List</h1>
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
                                                Name
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Qty
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Day
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Total Price
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @php
                                            $sum = 0;
                                        @endphp
                                        @forelse ($loans as $item)
                                            @php
                                                $sum += $item->t_price;
                                            @endphp
                                            <tr>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $item->p_name }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <span class="text-sm leading-5 text-gray-900">
                                                        {{ $item->quantity }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <span class="text-sm leading-5 text-gray-900">
                                                        {{ $item->days }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                    Rp{{ number_format($item->t_price, 2) }}
                                                </td>
                                                <td class="border-b border-gray-200">
                                                    <form method="POST"
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline"
                                                        action="{{ route('order.destroy', $item->o_id) }}"
                                                        onsubmit="return confirm('Are you sure want to delete this data?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm ">
                                                            Return
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
    </div>




    </main>
    </div>
</x-app-layout>
