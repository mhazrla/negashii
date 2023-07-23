@include('layouts.navigation')
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
            <div class="mr-6">
                <h1 class="text-4xl font-semibold mb-2">Dashboard</h1>
                <h2 class="text-gray-600 ml-0.5">Our Activities</h2>
            </div>
            <div class="flex flex-wrap items-start justify-end -mb-3">


                <a href="{{ route('activity.create') }}"
                    class="inline-flex px-5 py-3 text-white bg-blue-600 hover:bg-purple-700 focus:bg-blue-700 rounded-md ml-6 mb-3">
                    <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __('Add New Activity') }}
                </a>
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
                            <h1 class="text-3xl font-bolder leading-tight text-gray-900">Activity List</h1>
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
                                                Date
                                            </th>
                                            <th class="px-6 py-3 text-left font-medium">
                                                Title
                                            </th>

                                            <th class="px-6 py-3 text-left font-medium">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($activities as $activity)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">

                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img class="h-10 w-10 rounded-full"
                                                                src="{{ url('storage/' . $activity->image1) }}"
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
                                                        {{ $activity->date }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900">
                                                        {{ $activity->title }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                                                    <div class="flex">
                                                        <div class="text-sm leading-5 text-gray-900 ">
                                                            <a href="{{ route('activity.show', $activity->id) }}"
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">
                                                                Show
                                                            </a>
                                                        </div>
                                                        <div class="text-sm leading-5 text-gray-900">
                                                            <a href="{{ route('activity.edit', $activity->id) }}"
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">
                                                                Edit
                                                            </a>
                                                        </div>
                                                        <div class="text-sm leading-5 text-gray-900">
                                                            <form method="POST"
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100  mx-4 text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline"
                                                                action="{{ route('activity.destroy', $activity->id) }}"
                                                                onsubmit="return confirm('Are you sure want to delete this data?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm ">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                                    colspan="6">
                                                    No Data
                                                </td>
                                            </tr>
                                        @endforelse


                                    </tbody>
                                    <!-- BODY end -->
                                    {{ $activities->links() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </main>
    </div>
</x-app-layout>
