<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Voice Recorder</h1>
                <a href="{{ route('voicerecorders.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('voicerecorders.update', $voicerecorder->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location', $voicerecorder->location) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="place" class="block text-gray-600 font-bold mb-2">Place:</label>
                                <input type="text" name="place" id="place" class="w-full border-2 border-gray-300 p-2" value="{{ old('place', $voicerecorder->place) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="level" class="block text-gray-600 font-bold mb-2">Level:</label>
                                <input type="text" name="level" id="level" class="w-full border-2 border-gray-300 p-2" value="{{ old('level', $voicerecorder->level) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="model" id="model" class="w-full border-2 border-gray-300 p-2" value="{{ old('model', $voicerecorder->model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $voicerecorder->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="memorycard" class="block text-gray-600 font-bold mb-2">Memory Card:</label>
                                <input type="text" name="memorycard" id="memorycard" class="w-full border-2 border-gray-300 p-2" value="{{ old('memorycard', $voicerecorder->memorycard) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-600 font-bold mb-2">Description:</label>
                                <input type="text" name="description" id="description" class="w-full border-2 border-gray-300 p-2" value="{{ old('description', $voicerecorder->description) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="supplier" class="block text-gray-600 font-bold mb-2">Supplier:</label>
                                <input type="text" name="supplier" id="supplier" class="w-full border-2 border-gray-300 p-2" value="{{ old('supplier', $voicerecorder->supplier) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ponumber" class="block text-gray-600 font-bold mb-2">PO Number:</label>
                                <input type="text" name="ponumber" id="ponumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('ponumber', $voicerecorder->ponumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="invoicenumber" class="block text-gray-600 font-bold mb-2">Invoice Number:</label>
                                <input type="text" name="invoicenumber" id="invoicenumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('invoicenumber', $voicerecorder->invoicenumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price:</label>
                                <input type="text" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price', $voicerecorder->price) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedate" class="block text-gray-600 font-bold mb-2">Purchase Date:</label>
                                <input type="date" name="purchasedate" id="purchasedate" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedate', $voicerecorder->purchasedate) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasedateaccount" class="block text-gray-600 font-bold mb-2">Purchase Date for Account:</label>
                                <input type="date" name="purchasedateaccount" id="purchasedateaccount" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasedateaccount', $voicerecorder->purchasedateaccount) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="warranty" class="block text-gray-600 font-bold mb-2">Warranty:</label>
                                <input type="date" name="warranty" id="warranty" class="w-full border-2 border-gray-300 p-2" value="{{ old('warranty', $voicerecorder->warranty) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Available" {{ $voicerecorder->status === 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Damage" {{ $voicerecorder->status === 'Damage' ? 'selected' : '' }}>Damage</option>
                                    <option value="Reserved" {{ $voicerecorder->status === 'Reserved' ? 'selected' : '' }}>Reserved</option>
                                    <option value="Scrap" {{ $voicerecorder->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Voice Recorder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
