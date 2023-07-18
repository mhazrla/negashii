@include('layouts.navigation')
<x-app-layout>

    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    <div class="py-6 px-4 md:px-6 2xl:px-20 mx-9 2xl:container 2xl:mx-auto">
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

        <div
            class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
            <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                <div
                    class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                    <p class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800">
                        Customer’s Cart</p>
                    {{-- Data 1 Start --}}
                    @php
                        $sum = 0;
                    @endphp
                    @forelse ($orders as $item)
                        @php
                            $sum += $item->total_price;
                        @endphp
                        <div
                            class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                            <div class="pb-4 md:pb-8 w-full md:w-40">
                                <img class="w-full hidden md:block" src="{{ $item->product->image_1 }}" alt="dress" />
                                <img class="w-full md:hidden" src="{{ $item->product->image_1 }}" alt="dress" />
                            </div>
                            <div
                                class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                <div class="w-full flex flex-col justify-start items-start space-y-8">
                                    <h3
                                        class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-gray-800">
                                        {{ $item->product->name }}</h3>
                                    <div class="flex justify-start items-start flex-col space-y-2">
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Category: </span>
                                            {{ $item->product->category->name }}</p>
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Qty: </span>
                                            {{ $item->qty }}</p>
                                        <p class="text-sm dark:text-white leading-none text-gray-800"><span
                                                class="dark:text-gray-400 text-gray-300">Rent days: </span>
                                            {{ $item->day }}</p>
                                    </div>
                                </div>
                                <div class="flex justify-between space-x-8 items-start w-full">
                                    <p
                                        class="text-base dark:text-white xl:text-lg font-semibold leading-6 text-gray-800">
                                        Rp{{ number_format($item->total_price, 2) }}</p>

                                    <form method="POST"
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline"
                                        action="{{ route('order.destroy', $item->id) }}"
                                        onsubmit="return confirm('Are you sure want to delete this data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm ">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
                @if ($orders->count() != 0)
                    <div
                        class="flex justify-center  md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                        <div
                            class="flex flex-col justify-center px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                            <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Shipping</h3>
                            <div class="flex justify-between items-start w-full">
                                <div class="flex justify-center items-center space-x-4">
                                    <div class="w-8 h-8">
                                        <img class="w-full h-full" alt="logo"
                                            src="https://i.ibb.co/L8KSdNQ/image-3.png" />
                                    </div>
                                    <div class="flex flex-col justify-start items-center">
                                        <p class="text-lg leading-6 dark:text-white font-semibold text-gray-800">Total
                                            Price</p>
                                    </div>
                                </div>
                                <p class="text-lg font-semibold leading-6 dark:text-white text-gray-800">
                                    {{ number_format($sum, 2) }}</p>
                            </div>
                            <form method="POST" action="{{ route('order.checkout') }}">
                                <div class="w-full flex justify-center items-center">
                                    @csrf
                                    <input type="hidden" name="total_price" value="{{ $sum }}">

                                    <button
                                        class="hover:bg-black dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 py-5 w-96 md:w-full bg-gray-800 text-base font-medium leading-4 text-white">Checkout!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
            <div
                class="bg-gray-50 dark:bg-gray-800 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Customer Detail</h3>
                <div
                    class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex flex-col justify-start items-start flex-shrink-0">
                        <div
                            class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                            <img class="h-10 w-10 rounded-full"
                                src="{{ url('storage/users-avatar/' . Auth::user()->avatar) }}" alt="avatar" />
                            <div class="flex justify-start items-start flex-col space-y-2">
                                <p class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                    {{ Auth::user()->name }}</p>
                                @if ($orders->count() != 0)
                                    <p class="text-sm dark:text-gray-300 leading-5 text-gray-600">{{ $item->count() }}
                                        Previous Orders</p>
                                @endif
                            </div>
                        </div>

                        <div
                            class="flex justify-center text-gray-800 dark:text-white md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 7L12 13L21 7" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <p class="cursor-pointer text-sm leading-5 "> {{ Auth::user()->email }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="flex-grow text-gray-800">
        <main class="p-6 sm:p-10 space-y-6">
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
                                        @forelse ($orders as $item)
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
                                @if ($orders->count() !== 0)
                                    <div
                                        class="bg-gray-50 border-b border-gray-200 text-xs leading-4 text-gray-500 uppercase tracking-wider  hidden md:block h-10 rounded-b-lg border-l  border-r ">
                                        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                                            <div class="mr-6">
                                                <p class="text-md p-2 ml-3 mx-auto font-semibold ">Total Price</p>
                                            </div>
                                            <div class="mr-6">
                                                <h1 class="text-md p-2 mx-auto font-semibold ">
                                                    Rp{{ number_format($sum, 2) }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            @if ($orders->count() != 0)
                                <div class="px-4 py-4 mx-auto flex flex-wrap">
                                    <div class="flex md:mt-4 mt-6">
                                        <form method="POST" action="{{ route('order.checkout') }}">
                                            @csrf
                                            <input type="hidden" name="total_price" value="{{ $sum }}">
                                            <button type="submit"
                                                class="btn inline-flex text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded ml-4">
                                                Checkout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div> --}}
</x-app-layout>
