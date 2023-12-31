<x-admin-layout>
    <x-slot name="main">

        @section('page-title')
            <title>Expense Add</title>
        @endsection

        <!-- Card Section -->
        <div class="w-full pt-5 px-4 sm:px-6 md:px-8">

            <div class="bg-slate-300 rounded-xl shadow p-4 mb-10 sm:p-7 dark:bg-slate-800">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center">
                        Expense Add
                    </h2>
                    <label class="inline-block text-sm font-medium dark:text-gray-400">
                        Expense add info
                    </label>

                </div>

                <form action="{{ route('admin.expense.expense_addSave') }}" method="POST">
                    @csrf
                    <!-- Grid -->
                    <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">

                        <div class="sm:col-span-3">
                            <label for="date" class="block text-sm font-medium mb-2 dark:text-white">Date</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input type="date" id="date" name="date" required
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="mm/dd/yyyy" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="time" class="block text-sm font-medium mb-2 dark:text-white">Time</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input type="time" id="time" name="time" required
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="hh:mm" value="<?php echo date('H:i'); ?>">
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="name"
                                class="block text-sm font-medium mb-2 dark:text-white">Category</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <select name="name" id="name" required
                                class="py-2 px-3 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <option selected>Select bus</option>
                                @foreach ($exp_cat as $item)
                                    <option value="{{ $item->name }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="amount" class="block text-sm font-medium mb-2 dark:text-white">Amaount</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input type="number" id="amount" name="amount" required
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="50">
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Grid -->

                    <div class="mt-5 flex justify-end gap-x-2">
                        <input type="submit" value="Save"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">

                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Section -->

    </x-slot>
</x-admin-layout>