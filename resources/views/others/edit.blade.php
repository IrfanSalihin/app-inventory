<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Other Product</h1>
                <a href="{{ route('others.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('others.update', $other->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location', $other->location) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="place" class="block text-gray-600 font-bold mb-2">Place:</label>
                                <input type="text" name="place" id="place" class="w-full border-2 border-gray-300 p-2" value="{{ old('place', $other->place) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="model" id="model" class="w-full border-2 border-gray-300 p-2" value="{{ old('model', $other->model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="item" class="block text-gray-600 font-bold mb-2">Item:</label>
                                <input type="text" name="item" id="item" class="w-full border-2 border-gray-300 p-2" value="{{ old('item', $other->item) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="unit" class="block text-gray-600 font-bold mb-2">Unit:</label>
                                <input type="text" name="unit" id="unit" class="w-full border-2 border-gray-300 p-2" value="{{ old('unit', $other->unit) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $other->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="supplier" class="block text-gray-600 font-bold mb-2">Supplier:</label>
                                <input type="text" name="supplier" id="supplier" class="w-full border-2 border-gray-300 p-2" value="{{ old('supplier', $other->supplier) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedate" class="block text-gray-600 font-bold mb-2">Purchase Date:</label>
                                <input type="date" name="purchasedate" id="purchasedate" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedate', $other->purchasedate) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price (RM):</label>
                                <input type="number" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price', $other->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Available" {{ $other->status === 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Damage" {{ $other->status === 'Damage' ? 'selected' : '' }}>Damage</option>
                                    <option value="Reserved" {{ $other->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    <option value="Scrap" {{ $other->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Other Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
