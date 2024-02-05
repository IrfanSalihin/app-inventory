<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Photostate Machine</h1>
                <a href="{{ route('photostatemacs.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('photostatemacs.update', $photostatemac->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location', $photostatemac->location) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="level" class="block text-gray-600 font-bold mb-2">Level:</label>
                                <input type="text" name="level" id="level" class="w-full border-2 border-gray-300 p-2" value="{{ old('level', $photostatemac->level) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="model" id="model" class="w-full border-2 border-gray-300 p-2" value="{{ old('model', $photostatemac->model) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="type" class="block text-gray-600 font-bold mb-2">Type:</label>
                                <input type="text" name="type" id="type" class="w-full border-2 border-gray-300 p-2" value="{{ old('type', $photostatemac->type) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serialnumber" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serialnumber" id="serialnumber" class="w-full border-2 border-gray-300 p-2" value="{{ old('serialnumber', $photostatemac->serialnumber) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="ownership" class="block text-gray-600 font-bold mb-2">Ownership:</label>
                                <select name="ownership" id="ownership" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Rental" {{ $photostatemac->ownership === 'Rental' ? 'selected' : '' }}>Rental</option>
                                    <option value="KOBIMBING" {{ $photostatemac->ownership === 'KOBIMBING' ? 'selected' : '' }}>KOBIMBING</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Active" {{ $photostatemac->status === 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Return" {{ $photostatemac->status === 'Return' ? 'selected' : '' }}>Return</option>
                                    <option value="Scrap" {{ $photostatemac->status === 'Scrap' ? 'selected' : '' }}>Scrap</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Photostate Machine
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
