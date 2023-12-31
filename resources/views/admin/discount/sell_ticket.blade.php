<x-admin-layout>
    <x-slot name="main">

        @section('page-title')
            <title>Sell TIcket</title>
        @endsection

        <!-- Card Section -->
        <div class="w-full pt-5 px-4 sm:px-6 md:px-8">

            <div class="bg-slate-300 rounded-xl shadow p-4 mb-10 sm:p-7 dark:bg-slate-800">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center">
                        Sell TIcket
                    </h2>
                    <label class="inline-block text-sm font-medium dark:text-gray-400">
                        Sell TIcket info
                    </label>

                </div>

                <form action="{{ route('admin.discount.sell_ticketSave') }}" method="POST">
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
                            <label for="company_name" class="block text-sm font-medium mb-2 dark:text-white">Bus
                                Name</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <select name="company_name" id="company_name" required
                                class="py-2 px-3 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                <option selected>Select bus</option>
                                @foreach ($conditions as $item)
                                    <option value="{{ $item->name }}" data-value="{{ $item->quantity }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="mobile" class="block text-sm font-medium mb-2 dark:text-white">Mobile</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input type="text" id="mobile" name="mobile" required onkeyup="getName(this.value)"
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="01751944774" maxlength="11">
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium mb-2 dark:text-white">Name</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input type="text" id="name" name="name" required
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Mr. ">
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="quantity"
                                class="block text-sm font-medium mb-2 dark:text-white">Quantity</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input type="number" id="quantity" name="quantity" required
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="10">
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-3">
                            <label for="commission" class="block text-sm font-medium mb-2 dark:text-white">CC</label>
                        </div>
                        <!-- End Col -->

                        <div class="sm:col-span-9">
                            <input type="number" id="commission" name="commission" required
                                class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="50">
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Grid -->

                    <div class="mt-5 flex justify-end gap-x-2">

                        <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                            href="{{ route('admin.discount.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                            </svg>
                            Back
                        </a>

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

<script>
    // onchange="changeValue()"
    function changeValue() {
        var dropdown = document.getElementsByName("company_name")[0];
        var inputBox = document.getElementById("quantity");
        inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-value");
    }

    function getName(mobile) {
        // Send an AJAX request to the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Update the name input field with the retrieved name without double quotes
                var name = this.responseText.replace(/^"(.*)"$/, '$1');
                document.getElementById("name").value = name;
            }
        };

        // Use Laravel route() function to generate the URL
        var url = "{{ route('get_name', ['mobile' => 'temp']) }}"; // 'temp' is a placeholder

        // Replace the placeholder with the actual mobile number
        url = url.replace('temp', encodeURIComponent(mobile));

        xhttp.open("GET", url, true);
        xhttp.send();
    }
</script>
