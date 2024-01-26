<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Cafeteria Item</h1>
                <a href="{{ route('cafeterias.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('cafeterias.update', $cafeteria->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="staffname" class="block text-gray-600 font-bold mb-2">Staff Name:</label>
                                <input type="text" name="staffname" id="staffname" class="w-full border-2 border-gray-300 p-2" value="{{ old('staffname', $cafeteria->staffname) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="staffnumber" class="block text-gray-600 font-bold mb-2">Staff Number:</label>
                                <input type="text" name="staffnumber" id="staffnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('staffnumber', $cafeteria->staffnumber) }}" required>
                            </div>
                            <!-- Add other fields for Cafeteria item here -->
                            <div class="mb-4">
                                <label for="item" class="block text-gray-600 font-bold mb-2">Item:</label>
                                <input type="text" name="item" id="item" class="w-full border-2 border-gray-300 p-2" value="{{ old('item', $cafeteria->item) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="itemdescription" class="block text-gray-600 font-bold mb-2">Item Description:</label>
                                <input type="text" name="itemdescription" id="itemdescription" class="w-full border-2 border-gray-300 p-2" value="{{ old('itemdescription', $cafeteria->itemdescription) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="brandnmodel" class="block text-gray-600 font-bold mb-2">Brand & Model:</label>
                                <input type="text" name="brandnmodel" id="brandnmodel" class="w-full border-2 border-gray-300 p-2" value="{{ old('brandnmodel', $cafeteria->brandnmodel) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $cafeteria->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="payment" class="block text-gray-600 font-bold mb-2">Payment Date:</label>
                                <input type="date" name="payment" id="payment" class="w-full border-2 border-gray-300 p-2" value="{{ old('payment', $cafeteria->payment) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="originalvalue" class="block text-gray-600 font-bold mb-2">Original Value (RM):</label>
                                <input type="number" name="originalvalue" id="originalvalue" class="w-full border-2 border-gray-300 p-2" value="{{ old('originalvalue', $cafeteria->originalvalue) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Available" {{ $cafeteria->status === 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Damage" {{ $cafeteria->status === 'Damage' ? 'selected' : '' }}>Damage</option>
                                    <option value="Reserved" {{ $cafeteria->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    <option value="Scrap" {{ $cafeteria->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>

                            <!-- Add other fields for Cafeteria item here -->
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Cafeteria Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
