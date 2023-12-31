<x-admin-layout>
    <x-slot name="main">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <main class="p-4 h-auto pt-20">
                        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-slate-800">
                                    <tr>
                                        <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                            <div class="flex items-center gap-x-2 ">
                                                <span
                                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    ID
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
                                                    Qunatity
                                                </span>
                                            </div>
                                        </th>
                                        <th scope="col" class="pl-6 lg:pl-3 xl:pl-6 pr-6 py-3 text-left">
                                            <div class="flex items-center gap-x-2 ">
                                                <span
                                                    class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    Discount
                                                </span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($discounts as $item)
                                        <tr>
                                            <td class="h-px w-72 whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->date }}
                                                        <br>{{ $item->id }} </span>
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
                                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->quantity }}</span>
                                                </div>
                                            </td>
                                            <td class="h-px w-72 whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $item->discount }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
                                7
                            </div>
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
                                7</div>
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
                                7</div>
                            <div
                                class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72">
                                7</div>
                        </div>

                    </main>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
