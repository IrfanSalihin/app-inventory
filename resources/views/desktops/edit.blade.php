<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Desktop</h1>
                <a href="{{ route('desktops.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('desktops.update', $desktop->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="staff_name" class="block text-gray-600 font-bold mb-2">Staff Name:</label>
                                <input type="text" name="staff_name" id="staff_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('staff_name', $desktop->staff_name) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <select name="location" id="location" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="">Select Location</option>
                                    <option value="Ibu Pejabat" {{ old('location', $desktop->location) == 'Ibu Pejabat' ? 'selected' : '' }}>Ibu Pejabat</option>
                                    <option value="Ar-Rahnu Ketereh" {{ old('location', $desktop->location) == 'Ar-Rahnu Ketereh' ? 'selected' : '' }}>Ar-Rahnu Ketereh</option>
                                    <option value="Ar-Rahnu Kota Bharu" {{ old('location', $desktop->location) == 'Ar-Rahnu Kota Bharu' ? 'selected' : '' }}>Ar-Rahnu Kota Bharu</option>
                                    <option value="Ar-Rahnu Wakaf Bharu" {{ old('location', $desktop->location) == 'Ar-Rahnu Wakaf Bharu' ? 'selected' : '' }}>Ar-Rahnu Wakaf Bharu</option>
                                    <option value="Ar-Rahnu Kampong Bharu" {{ old('location', $desktop->location) == 'Ar-Rahnu Kampong Bharu' ? 'selected' : '' }}>Ar-Rahnu Kampong Bharu</option>
                                    <option value="Ar-Rahnu Tanah Merah" {{ old('location', $desktop->location) == 'Ar-Rahnu Tanah Merah' ? 'selected' : '' }}>Ar-Rahnu Tanah Merah</option>
                                    <option value="Little Caliphs Reef Rawang" {{ old('location', $desktop->location) == 'Little Caliphs Reef Rawang' ? 'selected' : '' }}>Little Caliphs Reef Rawang</option>
                                    <option value="Little Caliphs Sg Buaya" {{ old('location', $desktop->location) == 'Little Caliphs Sg Buaya' ? 'selected' : '' }}>Little Caliphs Sg Buaya</option>
                                    <option value="Kafetaria" {{ old('location', $desktop->location) == 'Kafetaria' ? 'selected' : '' }}>Kafetaria</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="staff_number" class="block text-gray-600 font-bold mb-2">Staff Number:</label>
                                <input type="text" name="staff_number" id="staff_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('staff_number', $desktop->staff_number) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="cpu_model" class="block text-gray-600 font-bold mb-2">CPU Model:</label>
                                <input type="text" name="cpu_model" id="cpu_model" class="w-full border-2 border-gray-300 p-2" value="{{ old('cpu_model', $desktop->cpu_model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="cpu_name" class="block text-gray-600 font-bold mb-2">CPU Name:</label>
                                <input type="text" name="cpu_name" id="cpu_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('cpu_name', $desktop->cpu_name) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="cpu_serial_number" class="block text-gray-600 font-bold mb-2">CPU Serial Number:</label>
                                <input type="text" name="cpu_serial_number" id="cpu_serial_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('cpu_serial_number', $desktop->cpu_serial_number) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="monitor_model" class="block text-gray-600 font-bold mb-2">Monitor Model:</label>
                                <input type="text" name="monitor_model" id="monitor_model" class="w-full border-2 border-gray-300 p-2" value="{{ old('monitor_model', $desktop->monitor_model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="monitor_serial_number" class="block text-gray-600 font-bold mb-2">Monitor Serial Number:</label>
                                <input type="text" name="monitor_serial_number" id="monitor_serial_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('monitor_serial_number', $desktop->monitor_serial_number) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="keyboard" class="block text-gray-600 font-bold mb-2">Keyboard:</label>
                                <select name="keyboard" id="keyboard" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="1" {{ $desktop->keyboard ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ !$desktop->keyboard ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="mouse" class="block text-gray-600 font-bold mb-2">Mouse:</label>
                                <select name="mouse" id="mouse" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="1" {{ $desktop->mouse == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $desktop->mouse == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="pc_cable" class="block text-gray-600 font-bold mb-2">PC Cable:</label>
                                <select name="pc_cable" id="pc_cable" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="1" {{ $desktop->pc_cable == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $desktop->pc_cable == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="vga_cable" class="block text-gray-600 font-bold mb-2">VGA Cable:</label>
                                <select name="vga_cable" id="vga_cable" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="1" {{ $desktop->vga_cable == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $desktop->vga_cable == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="operating_system_name" class="block text-gray-600 font-bold mb-2">Operating System Name:</label>
                                <input type="text" name="operating_system_name" id="operating_system_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('operating_system_name', $desktop->operating_system_name) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="windows_product_key" class="block text-gray-600 font-bold mb-2">Windows Product Key:</label>
                                <input type="text" name="windows_product_key" id="windows_product_key" class="w-full border-2 border-gray-300 p-2" value="{{ old('windows_product_key', $desktop->windows_product_key) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="operating_system_bit" class="block text-gray-600 font-bold mb-2">Operating System (bit):</label>
                                <select name="operating_system_bit" id="operating_system_bit" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="32" {{ (old('operating_system_bit', $desktop->operating_system_bit) == '32') ? 'selected' : '' }}>32 bit</option>
                                    <option value="64" {{ (old('operating_system_bit', $desktop->operating_system_bit) == '64') ? 'selected' : '' }}>64 bit</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="processor" class="block text-gray-600 font-bold mb-2">Processor:</label>
                                <input type="text" name="processor" id="processor" class="w-full border-2 border-gray-300 p-2" value="{{ old('processor', $desktop->processor) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="device_id" class="block text-gray-600 font-bold mb-2">Device ID:</label>
                                <input type="text" name="device_id" id="device_id" class="w-full border-2 border-gray-300 p-2" value="{{ old('device_id', $desktop->device_id) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="product_id" class="block text-gray-600 font-bold mb-2">Product ID:</label>
                                <input type="text" name="product_id" id="product_id" class="w-full border-2 border-gray-300 p-2" value="{{ old('product_id', $desktop->product_id) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="hdd_sizes" class="block text-gray-600 font-bold mb-2">HDD Sizes (GB):</label>
                                <input type="number" name="hdd_sizes" id="hdd_sizes" class="w-full border-2 border-gray-300 p-2" value="{{ old('hdd_sizes', $desktop->hdd_sizes) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ssd_sizes" class="block text-gray-600 font-bold mb-2">SSD Sizes (GB):</label>
                                <input type="number" name="ssd_sizes" id="ssd_sizes" class="w-full border-2 border-gray-300 p-2" value="{{ old('ssd_sizes', $desktop->ssd_sizes) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ram_sizes" class="block text-gray-600 font-bold mb-2">RAM Sizes (GB):</label>
                                <input type="number" name="ram_sizes" id="ram_sizes" class="w-full border-2 border-gray-300 p-2" value="{{ old('ram_sizes', $desktop->ram_sizes) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_year" class="block text-gray-600 font-bold mb-2">Microsoft Office Year:</label>
                                <input type="text" name="microsoft_office_year" id="microsoft_office_year" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_year', $desktop->microsoft_office_year) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_lisence" class="block text-gray-600 font-bold mb-2">Microsoft Office Lisence:</label>
                                <input type="text" name="microsoft_office_lisence" id="microsoft_office_lisence" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_lisence', $desktop->microsoft_office_lisence) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_id" class="block text-gray-600 font-bold mb-2">Microsoft Office ID:</label>
                                <input type="text" name="microsoft_office_id" id="microsoft_office_id" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_id', $desktop->microsoft_office_id) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_password" class="block text-gray-600 font-bold mb-2">Microsoft Office Password:</label>
                                <input type="text" name="microsoft_office_password" id="microsoft_office_password" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_password', $desktop->microsoft_office_password) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="antivirus" class="block text-gray-600 font-bold mb-2">Antivirus Present:</label>
                                <select name="antivirus" id="antivirus" class="w-full border-2 border-gray-300 p-2" required onchange="toggleAntivirusFields()">
                                    <option value="1" {{ $desktop->antivirus == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $desktop->antivirus == 0 ? 'selected' : '' }}>No</option>
                                    <option value="2" {{ $desktop->antivirus == 2 ? 'selected' : '' }}>Expired</option>
                                </select>
                            </div>
                            <div class="mb-4" id="antivirusFields" style="display: none;">
                                <label for="antivirus_expired_date" class="block text-gray-600 font-bold mb-2">Antivirus Expired Date:</label>
                                <input type="date" name="antivirus_expired_date" id="antivirus_expired_date" class="w-full border-2 border-gray-300 p-2" value="{{ old('antivirus_expired_date', $desktop->antivirus_expired_date) }}" required>
                            </div>

                            <div class="mb-4" id="antivirusLicenseField" style="display: none;">
                                <label for="antivirus_lisence" class="block text-gray-600 font-bold mb-2">Antivirus License:</label>
                                <input type="text" name="antivirus_lisence" id="antivirus_lisence" class="w-full border-2 border-gray-300 p-2" value="{{ old('antivirus_lisence', $desktop->antivirus_lisence) }}" required>
                            </div>

                            <script>
                                function toggleAntivirusFields() {
                                    var antivirusSelect = document.getElementById('antivirus');
                                    var antivirusFields = document.getElementById('antivirusFields');
                                    var antivirusLicenseField = document.getElementById('antivirusLicenseField');

                                    if (antivirusSelect.value === '1') {
                                        antivirusFields.style.display = 'block';
                                        antivirusLicenseField.style.display = 'block';
                                        document.getElementById('antivirus_expired_date').setAttribute('required', 'required');
                                        document.getElementById('antivirus_lisence').setAttribute('required', 'required');
                                    } else {
                                        antivirusFields.style.display = 'none';
                                        antivirusLicenseField.style.display = 'none';
                                        document.getElementById('antivirus_expired_date').removeAttribute('required');
                                        document.getElementById('antivirus_lisence').removeAttribute('required');
                                    }
                                }

                                // Call the function initially to set the fields based on the default selection
                                toggleAntivirusFields();
                            </script>
                            <div class="mb-4">
                                <label for="year" class="block text-gray-600 font-bold mb-2">Year:</label>
                                <input type="text" name="year" id="year" class="w-full border-2 border-gray-300 p-2" value="{{ old('year', $desktop->year) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="account_purchase_date" class="block text-gray-600 font-bold mb-2">Account Purchase Date:</label>
                                <input type="date" name="account_purchase_date" id="account_purchase_date" class="w-full border-2 border-gray-300 p-2" value="{{ old('account_purchase_date', $desktop->account_purchase_date) }}">
                            </div>
                            <div class="mb-4">
                                <label for="date_purchased" class="block text-gray-600 font-bold mb-2">Date Purchased:</label>
                                <input type="date" name="date_purchased" id="date_purchased" class="w-full border-2 border-gray-300 p-2" value="{{ old('date_purchased', $desktop->date_purchased) }}">
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price:</label>
                                <input type="text" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price', $desktop->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Available" {{ $desktop->status === 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Damage" {{ $desktop->status === 'Damage' ? 'selected' : '' }}>Damage</option>
                                    <option value="Reserved" {{ $desktop->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    <option value="Scrap" {{ $desktop->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Desktop
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>