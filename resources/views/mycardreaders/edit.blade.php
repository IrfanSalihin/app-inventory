<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Mycard Reader</h1>
                <a href="{{ route('mycardreaders.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('mycardreaders.update', $mycardreader->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location', $mycardreader->location) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="branches" class="block text-gray-600 font-bold mb-2">Branches:</label>
                                <input type="text" name="branches" id="branches" class="w-full border-2 border-gray-300 p-2" value="{{ old('branches', $mycardreader->branches) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="department" class="block text-gray-600 font-bold mb-2">Department:</label>
                                <input type="text" name="department" id="department" class="w-full border-2 border-gray-300 p-2" value="{{ old('department', $mycardreader->department) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="staffname" class="block text-gray-600 font-bold mb-2">Staff Name:</label>
                                <input type="text" name="staffname" id="staffname" class="w-full border-2 border-gray-300 p-2" value="{{ old('staffname', $mycardreader->staffname) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="model" id="model" class="w-full border-2 border-gray-300 p-2" value="{{ old('model', $mycardreader->model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $mycardreader->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedate" class="block text-gray-600 font-bold mb-2">Purchase Date:</label>
                                <input type="date" name="purchasedate" id="purchasedate" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedate', $mycardreader->purchasedate) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price (RM):</label>
                                <input type="number" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price', $mycardreader->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="notes" class="block text-gray-600 font-bold mb-2">Notes:</label>
                                <textarea name="notes" id="notes" class="w-full border-2 border-gray-300 p-2">{{ old('notes', $mycardreader->notes) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Available" {{ $mycardreader->status === 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Damage" {{ $mycardreader->status === 'Damage' ? 'selected' : '' }}>Damage</option>
                                    <option value="Reserved" {{ $mycardreader->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    <option value="Scrap" {{ $mycardreader->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Mycard Reader
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
