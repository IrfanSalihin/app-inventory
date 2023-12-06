<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Add Notebook</h1>
                <a href="{{ route('notebooks.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('notebooks.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="staff_name" class="block text-gray-600 font-bold mb-2">Staff Name:</label>
                                <input type="text" name="staff_name" id="staff_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('staff_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="staff_number" class="block text-gray-600 font-bold mb-2">Staff Number:</label>
                                <input type="text" name="staff_number" id="staff_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('staff_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="notebook_details_model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="notebook_details_model" id="notebook_details_model" class="w-full border-2 border-gray-300 p-2" value="{{ old('notebook_details_model') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="notebook_details_pc_name" class="block text-gray-600 font-bold mb-2">PC Name:</label>
                                <input type="text" name="notebook_details_pc_name" id="notebook_details_pc_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('notebook_details_pc_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="notebook_details_serial_number" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="notebook_details_serial_number" id="notebook_details_serial_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('notebook_details_serial_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="charger_model" class="block text-gray-600 font-bold mb-2">Charger Model:</label>
                                <input type="text" name="charger_model" id="charger_model" class="w-full border-2 border-gray-300 p-2" value="{{ old('charger_model') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="charger_serial_number" class="block text-gray-600 font-bold mb-2">Charger Serial Number:</label>
                                <input type="text" name="charger_serial_number" id="charger_serial_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('charger_serial_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="power_cable_quantity" class="block text-gray-600 font-bold mb-2">Power Cable Quantity:</label>
                                <input type="number" name="power_cable_quantity" id="power_cable_quantity" class="w-full border-2 border-gray-300 p-2" value="{{ old('power_cable_quantity') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="operating_system" class="block text-gray-600 font-bold mb-2">Operating System:</label>
                                <input type="text" name="operating_system" id="operating_system" class="w-full border-2 border-gray-300 p-2" value="{{ old('operating_system') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="windows_product_key" class="block text-gray-600 font-bold mb-2">Windows Product Key:</label>
                                <input type="text" name="windows_product_key" id="windows_product_key" class="w-full border-2 border-gray-300 p-2" value="{{ old('windows_product_key') }}">
                            </div>
                            <div class="mb-4">
                                <label for="operating_system_bit" class="block text-gray-600 font-bold mb-2">Operating System (Bit):</label>
                                <input type="text" name="operating_system_bit" id="operating_system_bit" class="w-full border-2 border-gray-300 p-2" value="{{ old('operating_system_bit') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="processor" class="block text-gray-600 font-bold mb-2">Processor:</label>
                                <input type="text" name="processor" id="processor" class="w-full border-2 border-gray-300 p-2" value="{{ old('processor') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="device_id" class="block text-gray-600 font-bold mb-2">Device ID:</label>
                                <input type="text" name="device_id" id="device_id" class="w-full border-2 border-gray-300 p-2" value="{{ old('device_id') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="product_id" class="block text-gray-600 font-bold mb-2">Product ID:</label>
                                <input type="text" name="product_id" id="product_id" class="w-full border-2 border-gray-300 p-2" value="{{ old('product_id') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="storage_drives" class="block text-gray-600 font-bold mb-2">Storage Drives:</label>
                                <input type="text" name="storage_drives" id="storage_drives" class="w-full border-2 border-gray-300 p-2" value="{{ old('storage_drives') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="storage_size" class="block text-gray-600 font-bold mb-2">Storage Size:</label>
                                <input type="text" name="storage_size" id="storage_size" class="w-full border-2 border-gray-300 p-2" value="{{ old('storage_size') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ram_size" class="block text-gray-600 font-bold mb-2">RAM Size:</label>
                                <input type="text" name="ram_size" id="ram_size" class="w-full border-2 border-gray-300 p-2" value="{{ old('ram_size') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="graphic_card" class="block text-gray-600 font-bold mb-2">Graphic Card:</label>
                                <input type="text" name="graphic_card" id="graphic_card" class="w-full border-2 border-gray-300 p-2" value="{{ old('graphic_card') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_version" class="block text-gray-600 font-bold mb-2">Microsoft Office Version:</label>
                                <input type="text" name="microsoft_office_version" id="microsoft_office_version" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_version') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_license_key" class="block text-gray-600 font-bold mb-2">Microsoft Office License Key:</label>
                                <input type="text" name="microsoft_office_license_key" id="microsoft_office_license_key" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_license_key') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_outlook_id" class="block text-gray-600 font-bold mb-2">Microsoft Office Outlook ID:</label>
                                <input type="text" name="microsoft_office_outlook_id" id="microsoft_office_outlook_id" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_outlook_id') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_outlook_password" class="block text-gray-600 font-bold mb-2">Microsoft Office Outlook Password:</label>
                                <input type="password" name="microsoft_office_outlook_password" id="microsoft_office_outlook_password" class="w-full border-2 border-gray-300 p-2" required>
                            </div>
                            <div class="mb-4">
                                <label for="antivirus_present" class="block text-gray-600 font-bold mb-2">Antivirus Present:</label>
                                <select name="antivirus_present" id="antivirus_present" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="antivirus_expired_date" class="block text-gray-600 font-bold mb-2">Antivirus Expired Date:</label>
                                <input type="date" name="antivirus_expired_date" id="antivirus_expired_date" class="w-full border-2 border-gray-300 p-2" value="{{ old('antivirus_expired_date') }}">
                            </div>
                            <div class="mb-4">
                                <label for="antivirus_license_key" class="block text-gray-600 font-bold mb-2">Antivirus License Key:</label>
                                <input type="text" name="antivirus_license_key" id="antivirus_license_key" class="w-full border-2 border-gray-300 p-2" value="{{ old('antivirus_license_key') }}">
                            </div>
                            <div class="mb-4">
                                <label for="antivirus_purchasing_date" class="block text-gray-600 font-bold mb-2">Antivirus Purchasing Date:</label>
                                <input type="date" name="antivirus_purchasing_date" id="antivirus_purchasing_date" class="w-full border-2 border-gray-300 p-2" value="{{ old('antivirus_purchasing_date') }}">
                            </div>
                            <div class="mb-4">
                                <label for="antivirus_renewal_price" class="block text-gray-600 font-bold mb-2">Antivirus Renewal Price (RM):</label>
                                <input type="number" name="antivirus_renewal_price" id="antivirus_renewal_price" class="w-full border-2 border-gray-300 p-2" value="{{ old('antivirus_renewal_price') }}">
                            </div>
                            <div class="mb-4">
                                <label for="notebook_warranty" class="block text-gray-600 font-bold mb-2">Notebook Warranty:</label>
                                <input type="text" name="notebook_warranty" id="notebook_warranty" class="w-full border-2 border-gray-300 p-2" value="{{ old('notebook_warranty') }}" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save Notebook
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>