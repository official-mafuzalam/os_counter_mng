<x-admin-layout>
    <x-slot name="main">

        @section('page-title')
            <title>Expense</title>
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
                                                Expense
                                            </h2>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                Add Expense, edit and more.
                                            </p>
                                        </div>

                                        <div>
                                            <form action="" method="get">
                                                <div class="inline-flex gap-x-2">
                                                    <input type="date" name="date"
                                                        class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                                        placeholder="mm/dd/yyyy" value="<?php echo date('Y-m-d'); ?>">

                                                    <button type="submit"
                                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                        Search
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <div>
                                            <div class="inline-flex gap-x-2">
                                                <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                                    href="{{ route('admin.expense.category') }}">
                                                    View all category
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                                    </svg>
                                                </a>

                                                <a href="{{ route('admin.expense.expense_add') }}"
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

                                    <!-- Table -->
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-slate-800">
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
                                                            Name
                                                        </span>
                                                    </div>
                                                </th>
                                                <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                                    <div class="flex items-center gap-x-2 ">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                            Amount
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

                                            @foreach ($expenses as $item)
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
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->name }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="h-px w-72 whitespace-nowrap">
                                                        <div class="px-6 py-3">
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->amount }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="h-px w-px whitespace-nowrap">
                                                        <div class="px-6 py-1.5">
                                                            <a class="inline-flex items-center gap-x-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                                href="#">
                                                                Edit
                                                            </a>
                                                        </div>
                                                        <div class="px-6 py-1.5">
                                                            <a class="inline-flex items-center gap-x-1.5 text-sm text-red-600 decoration-2 hover:underline font-medium"
                                                                href="#">
                                                                Delete
                                                            </a>
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
                                                Total: <span
                                                    class="font-semibold text-gray-800 dark:text-gray-200">{{ $totalAmount }}</span>

                                            </p>
                                        </div>

                                        <div>
                                            <div class="inline-flex gap-x-2">
                                                <button type="button"
                                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                                    </svg>
                                                    Prev
                                                </button>

                                                <button type="button"
                                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                    Next
                                                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                    </svg>
                                                </button>
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
