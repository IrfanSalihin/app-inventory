<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit iPad</h1>
                <a href="{{ route('ipads.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('ipads.update', $ipad->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="department" class="block text-gray-600 font-bold mb-2">Department:</label>
                                <input type="text" name="department" id="department" class="w-full border-2 border-gray-300 p-2" value="{{ old('department', $ipad->department) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-600 font-bold mb-2">Name:</label>
                                <input type="text" name="name" id="name" class="w-full border-2 border-gray-300 p-2" value="{{ old('name', $ipad->name) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $ipad->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="storagesize" class="block text-gray-600 font-bold mb-2">Storage Size:</label>
                                <input type="text" name="storagesize" id="storagesize" class="w-full border-2 border-gray-300 p-2" value="{{ old('storagesize', $ipad->storagesize) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="supplier" class="block text-gray-600 font-bold mb-2">Supplier:</label>
                                <input type="text" name="supplier" id="supplier" class="w-full border-2 border-gray-300 p-2" value="{{ old('supplier', $ipad->supplier) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ponumber" class="block text-gray-600 font-bold mb-2">PO Number:</label>
                                <input type="text" name="ponumber" id="ponumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('ponumber', $ipad->ponumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="invoicenumber" class="block text-gray-600 font-bold mb-2">Invoice Number:</label>
                                <input type="text" name="invoicenumber" id="invoicenumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('invoicenumber', $ipad->invoicenumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price:</label>
                                <input type="text" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price', $ipad->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedate" class="block text-gray-600 font-bold mb-2">Purchase Date:</label>
                                <input type="date" name="purchasedate" id="purchasedate" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedate', $ipad->purchasedate) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedateaccount" class="block text-gray-600 font-bold mb-2">Purchase Date for Account:</label>
                                <input type="date" name="purchasedateaccount" id="purchasedateaccount" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedateaccount', $ipad->purchasedateaccount) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="warranty" class="block text-gray-600 font-bold mb-2">Warranty:</label>
                                <input type="date" name="warranty" id="warranty" class="w-full border-2 border-gray-300 p-2" value="{{ old('warranty', $ipad->warranty) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="notes" class="block text-gray-600 font-bold mb-2">Notes:</label>
                                <textarea name="notes" id="notes" class="w-full border-2 border-gray-300 p-2" rows="3">{{ old('notes', $ipad->notes) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Available" {{ $ipad->status === 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Damage" {{ $ipad->status === 'Damage' ? 'selected' : '' }}>Damage</option>
                                    <option value="Reserved" {{ $ipad->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    <option value="Scrap" {{ $ipad->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update iPad
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
