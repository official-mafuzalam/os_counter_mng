<x-admin-layout>
    <x-slot name="main">

        @section('page-title')
            <title>Income</title>
        @endsection

        <div class="w-full pt-5 px-4 sm:px-6 md:px-8">

            <div class="bg-slate-300 rounded-xl shadow dark:bg-slate-800">

                <!-- Table Section -->
                <div class="bg-slate-300 rounded-xl shadow p-4 mb-10 sm:p-7 dark:bg-slate-800">

                    <!-- Card -->
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div
                                    class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                                    <!-- Header -->
                                    <div
                                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                                        <div>
                                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                                Sold Tickets
                                            </h2>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                Sold Tickets, edit and more.
                                            </p>
                                        </div>

                                        <div>
                                            <div class="inline-flex gap-x-2">

                                                <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                                    href="{{ route('admin.discount.condition') }}">
                                                    View all condition
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                                    </svg>
                                                </a>

                                                <a href="{{ route('admin.discount.sell_ticket') }}"
                                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" viewBox="0 0 16 16"
                                                        fill="none">
                                                        <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" />
                                                    </svg>
                                                    Create New
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Header -->
                                    <form action="" method="get">
                                        <div class="inline-flex gap-x-2 p-2 md:flex md:justify-between md:items-center">
                                            <input type="text" name="mobile"
                                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                placeholder="01751944774" maxlength="11">

                                            <input type="date" name="date"
                                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                placeholder="mm/dd/yyyy">

                                            <button type="submit"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                    <!-- Table -->
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-200 dark:bg-slate-800">
                                            <tr>
                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Date / Time
                                                        </span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Passenger
                                                        </span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Company
                                                        </span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Qunatity
                                                        </span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Status
                                                        </span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Status Act.
                                                        </span>
                                                    </div>
                                                </th>

                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Action
                                                        </span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                            @foreach ($sells as $item)
                                                <tr>
                                                    <td class="h-px w-72 whitespace-nowrap">
                                                        <div class="px-6 py-3">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->date }}
                                                                <br>{{ $item->time }} </span>
                                                        </div>
                                                    </td>
                                                    <td class="h-px w-72 whitespace-nowrap">
                                                        <div class="px-6 py-3">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->mobile }}
                                                                <br>{{ $item->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="h-px w-72 whitespace-nowrap">
                                                        <div class="px-6 py-3">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->company_name }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="h-px w-72 whitespace-nowrap">
                                                        <div class="px-6 py-3">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->quantity }}
                                                                <br> {{ $item->t_commission }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="h-px w-72 whitespace-nowrap">
                                                        <div class="px-6 py-3">
                                                            @if ($item->status == 0)
                                                                Not delivery
                                                            @elseif ($item->status == 1)
                                                                Delivery
                                                            @else
                                                                Cancel
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="h-px w-px whitespace-nowrap">
                                                        @if ($item->status == 0)
                                                            <div class="px-6 py-1.5">
                                                                <a class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                                    href="{{ route('admin.discount.sell_ticketStatus', ['id' => $item->id, 'status' => 1]) }}">
                                                                    Done
                                                                </a>
                                                            </div>
                                                            <div class="px-6 py-1.5">
                                                                <a class="inline-flex items-center gap-x-1.5 text-sm text-red-600 decoration-2 hover:underline font-medium"
                                                                    href="{{ route('admin.discount.sell_ticketStatus', ['id' => $item->id, 'status' => 2]) }}">
                                                                    Cancel
                                                                </a>
                                                            </div>
                                                        @else
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Unchangable</span>
                                                        @endif
                                                    </td>
                                                    <td class="h-px w-px whitespace-nowrap">
                                                        <div class="px-6 py-1.5">
                                                            <div
                                                                class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                                                <button id="hs-table-dropdown-2" type="button"
                                                                    class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                                    <svg class="flex-shrink-0 w-4 h-4"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <circle cx="12" cy="12" r="1" />
                                                                        <circle cx="19" cy="12" r="1" />
                                                                        <circle cx="5" cy="12" r="1" />
                                                                    </svg>
                                                                </button>
                                                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-[10rem] z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                                                    aria-labelledby="hs-table-dropdown-2">
                                                                    <div class="py-2 first:pt-0 last:pb-0">
                                                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                                            href="{{ route('admin.discount.sell_ticket_edit', ['id' => $item->id]) }}">
                                                                            Edit
                                                                        </a>
                                                                    </div>
                                                                    <div class="py-2 first:pt-0 last:pb-0">
                                                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700"
                                                                            href="#">
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- End Table -->

                                    <!-- Footer -->
                                    <div
                                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                                        <div>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                <span class="font-semibold text-gray-800 dark:text-gray-200">
                                                    {{ $sells->count() }}</span> result
                                            </p>
                                        </div>

                                        <div>
                                            <div class="inline-flex gap-x-2">
                                                <div class="inline-flex gap-x-2">
                                                    {{-- {{ $sells->links() }} --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Footer -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Table Section -->
            </div>
        </div>
    </x-slot>
</x-admin-layout>
