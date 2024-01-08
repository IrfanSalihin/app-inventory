<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">Desktop Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Name:</dt>
                            <dd>{{ $desktop->staff_name }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $desktop->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Number:</dt>
                            <dd>{{ $desktop->staff_number }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">CPU Model:</dt>
                            <dd>{{ $desktop->cpu_model }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">CPU Name:</dt>
                            <dd>{{ $desktop->cpu_name }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">CPU Serial Number:</dt>
                            <dd>{{ $desktop->cpu_serial_number }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Monitor Model:</dt>
                            <dd>{{ $desktop->monitor_model }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Monitor Serial Number:</dt>
                            <dd>{{ $desktop->monitor_serial_number }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Keyboard:</dt>
                            <dd>{{ $desktop->keyboard }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Mouse:</dt>
                            <dd>{{ $desktop->mouse }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">PC Cable:</dt>
                            <dd>{{ $desktop->pc_cable }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">VGA Cable:</dt>
                            <dd>{{ $desktop->vga_cable }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Operating System Name:</dt>
                            <dd>{{ $desktop->operating_system_name }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Windows Product Key:</dt>
                            <dd>{{ $desktop->windows_product_key }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Operating System (bit):</dt>
                            <dd>{{ $desktop->operating_system_bit }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Processor:</dt>
                            <dd>{{ $desktop->processor }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Device ID:</dt>
                            <dd>{{ $desktop->device_id }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Product ID:</dt>
                            <dd>{{ $desktop->product_id }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">HDD Sizes:</dt>
                            <dd>{{ $desktop->hdd_sizes }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">SSD Sizes:</dt>
                            <dd>{{ $desktop->ssd_sizes }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">RAM Sizes:</dt>
                            <dd>{{ $desktop->ram_sizes }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Microsoft Office Year:</dt>
                            <dd>{{ $desktop->microsoft_office_year }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Microsoft Office Lisence:</dt>
                            <dd>{{ $desktop->microsoft_office_lisence }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Microsoft Office Last 5 Digit:</dt>
                            <dd>{{ $desktop->microsoft_office_last_5_digit }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Microsoft Office ID:</dt>
                            <dd>{{ $desktop->microsoft_office_id }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Microsoft Office Password:</dt>
                            <dd>{{ $desktop->microsoft_office_password }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus Present:</dt>
                            <dd>{{ $desktop->antivirus ? 'Yes' : 'No' }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus Expired Date:</dt>
                            <dd>{{ $desktop->antivirus_expired_date }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus License:</dt>
                            <dd>{{ $desktop->antivirus_lisence }}</dd>
                        </div>
                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Year:</dt>
                            <dd>{{ $desktop->year }}</dd>
                        </div>
                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Account Purchase Date:</dt>
                            <dd>{{ $desktop->account_purchase_date }}</dd>
                        </div>
                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Price (RM):</dt>
                            <dd>{{ $desktop->price }}</dd>
                        </div>
                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $desktop->status }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex space-x-4">
                    <a href="{{ route('desktops.edit', $desktop->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                        <form action="{{ route('desktops.destroy', $desktop->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this desktop?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                        </form>
                        <!-- Add this button for exporting to Excel -->
                        <a href="{{ route('desktops.export', $desktop->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>