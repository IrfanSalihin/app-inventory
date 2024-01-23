<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Smartphone</h1>
                <a href="{{ route('smartphones.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('smartphones.update', $smartphone->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location', $smartphone->location) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="model" id="model" class="w-full border-2 border-gray-300 p-2" value="{{ old('model', $smartphone->model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="type" class="block text-gray-600 font-bold mb-2">Type:</label>
                                <input type="text" name="type" id="type" class="w-full border-2 border-gray-300 p-2" value="{{ old('type', $smartphone->type) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $smartphone->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ram" class="block text-gray-600 font-bold mb-2">RAM (GB):</label>
                                <input type="text" name="ram" id="ram" class="w-full border-2 border-gray-300 p-2" value="{{ old('ram', $smartphone->ram) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="rom" class="block text-gray-600 font-bold mb-2">ROM (GB):</label>
                                <input type="text" name="rom" id="rom" class="w-full border-2 border-gray-300 p-2" value="{{ old('rom', $smartphone->rom) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="color" class="block text-gray-600 font-bold mb-2">Color:</label>
                                <input type="text" name="color" id="color" class="w-full border-2 border-gray-300 p-2" value="{{ old('color', $smartphone->color) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="supplier" class="block text-gray-600 font-bold mb-2">Supplier:</label>
                                <input type="text" name="supplier" id="supplier" class="w-full border-2 border-gray-300 p-2" value="{{ old('supplier', $smartphone->supplier) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedate" class="block text-gray-600 font-bold mb-2">Purchase Date:</label>
                                <input type="date" name="purchasedate" id="purchasedate" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedate', $smartphone->purchasedate) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price (RM):</label>
                                <input type="text" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price', $smartphone->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="warranty" class="block text-gray-600 font-bold mb-2">Warranty (Year):</label>
                                <input type="text" name="warranty" id="warranty" class="w-full border-2 border-gray-300 p-2" value="{{ old('warranty', $smartphone->warranty) }}" required>
                            </div>
                            <div class="mb-4">
    <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
    <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
        <option value="Available" {{ $smartphone->status === 'Available' ? 'selected' : '' }}>Available</option>
        <option value="Damage" {{ $smartphone->status === 'Damage' ? 'selected' : '' }}>Damage</option>
        <option value="Reserved" {{ $smartphone->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
        <option value="Scrap" {{ $smartphone->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
    </select>
</div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Smartphone
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
