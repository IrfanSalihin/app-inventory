<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Notebook Details</h1>
                <a href="{{ route('notebooks.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Name:</dt>
                            <dd>{{ $notebook->staff_name }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Number:</dt>
                            <dd>{{ $notebook->staff_number }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $notebook->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Model:</dt>
                            <dd>{{ $notebook->notebook_details_model }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">PC Name:</dt>
                            <dd>{{ $notebook->notebook_details_pc_name }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $notebook->notebook_details_serial_number }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Charger Model:</dt>
                            <dd>{{ $notebook->charger_model }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Charger Serial Number:</dt>
                            <dd>{{ $notebook->charger_serial_number }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Power Cable Quantity:</dt>
                            <dd>{{ $notebook->power_cable_quantity }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Operating System:</dt>
                            <dd>{{ $notebook->operating_system }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Windows Product Key:</dt>
                            <dd>{{ $notebook->windows_product_key }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Operating System (Bit):</dt>
                            <dd>{{ $notebook->operating_system_bit }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Processor:</dt>
                            <dd>{{ $notebook->processor }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Device ID:</dt>
                            <dd>{{ $notebook->device_id }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Product ID:</dt>
                            <dd>{{ $notebook->product_id }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Storage Drives:</dt>
                            <dd>{{ $notebook->storage_drives }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Storage Size:</dt>
                            <dd>{{ $notebook->storage_size }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Graphic Card:</dt>
                            <dd>{{ $notebook->graphic_card }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">RAM (GB):</dt>
                            <dd>{{ $notebook->ram_size }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Microsoft Office Version:</dt>
                            <dd>{{ $notebook->microsoft_office_version }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Microsoft Office License Key:</dt>
                            <dd>{{ $notebook->microsoft_office_license_key }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Microsoft Office Outlook ID:</dt>
                            <dd>{{ $notebook->microsoft_office_outlook_id }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Microsoft Office Outlook Password:</dt>
                            <dd>{{ $notebook->microsoft_office_outlook_password }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus:</dt>
                            <dd>{{ $notebook->antivirus_present ? 'Yes' : 'No' }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus Expiry Date:</dt>
                            <dd>{{ $notebook->antivirus_expired_date }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus License Key:</dt>
                            <dd>{{ $notebook->antivirus_license_key }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus Purchasing Date:</dt>
                            <dd>{{ $notebook->antivirus_purchasing_date }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Antivirus Renewal Price (RM):</dt>
                            <dd>{{ $notebook->antivirus_renewal_price }}</dd>
                        </div>

                        <div class="mb-4">
                            <dt class="font-semibold text-gray-600">Notebook Warranty:</dt>
                            <dd>{{ $notebook->notebook_warranty }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('notebooks.edit', $notebook->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('notebooks.destroy', $notebook->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notebook?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                        </form>
                        <!-- Add this button for exporting to Excel -->
                        <a href="{{ route('notebooks.export', $notebook->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>