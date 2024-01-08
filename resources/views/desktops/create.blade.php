<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Add Desktop</h1>
                <a href="{{ route('desktops.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('desktops.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                                <label for="staff_name" class="block text-gray-600 font-bold mb-2">Staff Name:</label>
                                <input type="text" name="staff_name" id="staff_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('staff_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="staff_number" class="block text-gray-600 font-bold mb-2">Staff Number:</label>
                                <input type="text" name="staff_number" id="staff_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('staff_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="cpu_model" class="block text-gray-600 font-bold mb-2">CPU Model:</label>
                                <input type="text" name="cpu_model" id="cpu_model" class="w-full border-2 border-gray-300 p-2" value="{{ old('cpu_model') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="cpu_name" class="block text-gray-600 font-bold mb-2">CPU Name:</label>
                                <input type="text" name="cpu_name" id="cpu_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('cpu_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="cpu_serial_number" class="block text-gray-600 font-bold mb-2">CPU Serial Number:</label>
                                <input type="text" name="cpu_serial_number" id="cpu_serial_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('cpu_serial_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="monitor_model" class="block text-gray-600 font-bold mb-2">Monitor Model:</label>
                                <input type="text" name="monitor_model" id="monitor_model" class="w-full border-2 border-gray-300 p-2" value="{{ old('monitor_model') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="monitor_serial_number" class="block text-gray-600 font-bold mb-2">Monitor Serial Number:</label>
                                <input type="text" name="monitor_serial_number" id="monitor_serial_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('monitor_serial_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="keyboard" class="block text-gray-600 font-bold mb-2">Keyboard:</label>
                                <input type="text" name="keyboard" id="keyboard" class="w-full border-2 border-gray-300 p-2" value="{{ old('keyboard') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="mouse" class="block text-gray-600 font-bold mb-2">Mouse:</label>
                                <input type="text" name="mouse" id="mouse" class="w-full border-2 border-gray-300 p-2" value="{{ old('mouse') }}" required>
                            </div>
                            <div class="mb-4">
    <label for="pc_cable" class="block text-gray-600 font-bold mb-2">PC Cable:</label>
    <input type="number" name="pc_cable" id="pc_cable" class="w-full border-2 border-gray-300 p-2" value="{{ old('pc_cable') }}" required>
    <small class="text-red-500" id="pcCableWarning" style="display: none;">Please enter a valid number.</small>
</div>
<div class="mb-4">
    <label for="vga_cable" class="block text-gray-600 font-bold mb-2">VGA Cable:</label>
    <input type="number" name="vga_cable" id="vga_cable" class="w-full border-2 border-gray-300 p-2" value="{{ old('vga_cable') }}" required>
    <small class="text-red-500" id="vgaCableWarning" style="display: none;">Please enter a valid number.</small>
</div>
                            <div class="mb-4">
                                <label for="operating_system_name" class="block text-gray-600 font-bold mb-2">Operating System Name:</label>
                                <input type="text" name="operating_system_name" id="operating_system_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('operating_system_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="windows_product_key" class="block text-gray-600 font-bold mb-2">Windows Product Key:</label>
                                <input type="text" name="windows_product_key" id="windows_product_key" class="w-full border-2 border-gray-300 p-2" value="{{ old('windows_product_key') }}" required>
                            </div>
                            <div class="mb-4">
    <label for="operating_system_bit" class="block text-gray-600 font-bold mb-2">Operating System (bit):</label>
    <select name="operating_system_bit" id="operating_system_bit" class="w-full border-2 border-gray-300 p-2" required>
        <option value="32">32 bit</option>
        <option value="64">64 bit</option>
    </select>
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
    <label for="hdd_sizes" class="block text-gray-600 font-bold mb-2">HDD Sizes (GB):</label>
    <input type="number" name="hdd_sizes" id="hdd_sizes" class="w-full border-2 border-gray-300 p-2" value="{{ old('hdd_sizes') }}" required>
    <small class="text-red-500" id="hddSizesWarning" style="display: none;">Please enter a valid number.</small>
</div>
<div class="mb-4">
    <label for="ssd_sizes" class="block text-gray-600 font-bold mb-2">SSD Sizes (GB):</label>
    <input type="number" name="ssd_sizes" id="ssd_sizes" class="w-full border-2 border-gray-300 p-2" value="{{ old('ssd_sizes') }}" required>
    <small class="text-red-500" id="ssdSizesWarning" style="display: none;">Please enter a valid number.</small>
</div>
<div class="mb-4">
    <label for="ram_sizes" class="block text-gray-600 font-bold mb-2">RAM Sizes (GB):</label>
    <input type="number" name="ram_sizes" id="ram_sizes" class="w-full border-2 border-gray-300 p-2" value="{{ old('ram_sizes') }}" required>
    <small class="text-red-500" id="ramSizesWarning" style="display: none;">Please enter a valid number.</small>
</div>
                            <div class="mb-4">
                                <label for="microsoft_office_year" class="block text-gray-600 font-bold mb-2">Microsoft Office Year:</label>
                                <input type="text" name="microsoft_office_year" id="microsoft_office_year" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_year') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_lisence" class="block text-gray-600 font-bold mb-2">Microsoft Office Lisence:</label>
                                <input type="text" name="microsoft_office_lisence" id="microsoft_office_lisence" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_lisence') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_last_5_digit" class="block text-gray-600 font-bold mb-2">Microsoft Office Last 5 Digit:</label>
                                <input type="text" name="microsoft_office_last_5_digit" id="microsoft_office_last_5_digit" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_last_5_digit') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_id" class="block text-gray-600 font-bold mb-2">Microsoft Office ID:</label>
                                <input type="text" name="microsoft_office_id" id="microsoft_office_id" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_id') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="microsoft_office_password" class="block text-gray-600 font-bold mb-2">Microsoft Office Password:</label>
                                <input type="text" name="microsoft_office_password" id="microsoft_office_password" class="w-full border-2 border-gray-300 p-2" value="{{ old('microsoft_office_password') }}" required>
                            </div>
                            <div class="mb-4">
                            <label for="antivirus" class="block text-gray-600 font-bold mb-2">Antivirus Present:</label>
                                <select name="antivirus" id="antivirus" class="w-full border-2 border-gray-300 p-2" required onchange="toggleAntivirusFields()">
                                 <option value="1">Yes</option>
                                <option value="0">No</option>
                                </select>
                            </div>

                            <div class="mb-4" id="antivirusFields" style="display: none;">
                                <label for="antivirus_expired_date" class="block text-gray-600 font-bold mb-2">Antivirus Expired Date:</label>
                                 <input type="date" name="antivirus_expired_date" id="antivirus_expired_date" class="w-full border-2 border-gray-300 p-2">
                            </div>

                            <div class="mb-4" id="antivirusLicenseField" style="display: none;">
                                <label for="antivirus_lisence" class="block text-gray-600 font-bold mb-2">Antivirus License:</label>
                                <input type="text" name="antivirus_lisence" id="antivirus_lisence" class="w-full border-2 border-gray-300 p-2">
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

        function checkIntegerInput(inputId, warningId) {
        const inputField = document.getElementById(inputId);
        const warning = document.getElementById(warningId);
        const inputValue = inputField.value.trim();

        if (!Number.isInteger(Number(inputValue))) {
            warning.style.display = 'block';
            return false;
        } else {
            warning.style.display = 'none';
            return true;
        }
    }

    // Add event listeners to perform validation on input change
    document.getElementById('pc_cable').addEventListener('input', function() {
        checkIntegerInput('pc_cable', 'pcCableWarning');
    });

    document.getElementById('vga_cable').addEventListener('input', function() {
        checkIntegerInput('vga_cable', 'vgaCableWarning');
    });

    document.getElementById('hdd_sizes').addEventListener('input', function() {
        checkIntegerInput('hdd_sizes', 'hddSizesWarning');
    });

    document.getElementById('ssd_sizes').addEventListener('input', function() {
        checkIntegerInput('ssd_sizes', 'ssdSizesWarning');
    });

    document.getElementById('ram_sizes').addEventListener('input', function() {
        checkIntegerInput('ram_sizes', 'ramSizesWarning');
    });

    // Add form submission validation
    document.querySelector('form').addEventListener('submit', function(event) {
        const pcCableValid = checkIntegerInput('pc_cable', 'pcCableWarning');
        const vgaCableValid = checkIntegerInput('vga_cable', 'vgaCableWarning');
        const hddSizesValid = checkIntegerInput('hdd_sizes', 'hddSizesWarning');
        const ssdSizesValid = checkIntegerInput('ssd_sizes', 'ssdSizesWarning');
        const ramSizesValid = checkIntegerInput('ram_sizes', 'ramSizesWarning');

        if (!pcCableValid || !vgaCableValid || !hddSizesValid || !ssdSizesValid || !ramSizesValid) {
            event.preventDefault();
            // Optionally, you could show a general warning here if needed.
        }
    });
    }

    // Call the function initially to set the fields based on the default selection
    toggleAntivirusFields();
</script>
                            <div class="mb-4">
                                <label for="year" class="block text-gray-600 font-bold mb-2">Year:</label>
                                <input type="text" name="year" id="year" class="w-full border-2 border-gray-300 p-2" value="{{ old('year') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="account_purchase_date" class="block text-gray-600 font-bold mb-2">Account Purchase Date:</label>
                                <input type="date" name="account_purchase_date" id="account_purchase_date" class="w-full border-2 border-gray-300 p-2" value="{{ old('account_purchase_date') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price:</label>
                                <input type="number" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price') }}" required>
                            </div>
                            <div class="mb-4">
                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                    <option value="Available">Available</option>
                    <option value="Damage">Damage</option>
                    <option value="Reserved">Reserved</option>
                    <option value="Scrap">Scrap</option>
                </select>
            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save Desktop
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>