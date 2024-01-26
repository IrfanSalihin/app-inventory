<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit UPS</h1>
                <a href="{{ route('upowersupps.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('upowersupps.update', $upowersupp->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location', $upowersupp->location) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="model" id="model" class="w-full border-2 border-gray-300 p-2" value="{{ old('model', $upowersupp->model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="modeltype" class="block text-gray-600 font-bold mb-2">Model Type:</label>
                                <input type="text" name="modeltype" id="modeltype" class="w-full border-2 border-gray-300 p-2" value="{{ old('modeltype', $upowersupp->modeltype) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $upowersupp->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="supplier" class="block text-gray-600 font-bold mb-2">Supplier:</label>
                                <input type="text" name="supplier" id="supplier" class="w-full border-2 border-gray-300 p-2" value="{{ old('supplier', $upowersupp->supplier) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ponumber" class="block text-gray-600 font-bold mb-2">PO Number:</label>
                                <input type="text" name="ponumber" id="ponumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('ponumber', $upowersupp->ponumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="invoicenumber" class="block text-gray-600 font-bold mb-2">Invoice Number:</label>
                                <input type="text" name="invoicenumber" id="invoicenumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('invoicenumber', $upowersupp->invoicenumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price (RM):</label>
                                <input type="text" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price', $upowersupp->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedate" class="block text-gray-600 font-bold mb-2">Purchase Date:</label>
                                <input type="date" name="purchasedate" id="purchasedate" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedate', $upowersupp->purchasedate) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedateaccount" class="block text-gray-600 font-bold mb-2">Purchase Date (Account):</label>
                                <input type="date" name="purchasedateaccount" id="purchasedateaccount" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedateaccount', $upowersupp->purchasedateaccount) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="warranty" class="block text-gray-600 font-bold mb-2">Warranty (Year):</label>
                                <input type="text" name="warranty" id="warranty" class="w-full border-2 border-gray-300 p-2" value="{{ old('warranty', $upowersupp->warranty) }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Available" {{ $upowersupp->status === 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Damage" {{ $upowersupp->status === 'Damage' ? 'selected' : '' }}>Damage</option>
                                    <option value="Reserved" {{ $upowersupp->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    <option value="Scrap" {{ $upowersupp->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>
                            <!-- Add other fields for UPS details here -->
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update UPS
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
