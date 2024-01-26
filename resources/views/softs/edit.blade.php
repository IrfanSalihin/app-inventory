<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Edit Software</h1>
                <a href="{{ route('softs.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('softs.update', $soft->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="item" class="block text-gray-600 font-bold mb-2">Item:</label>
                                <input type="text" name="item" id="item" class="w-full border-2 border-gray-300 p-2" value="{{ old('item', $soft->item) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="vendor" class="block text-gray-600 font-bold mb-2">Vendor:</label>
                                <input type="text" name="vendor" id="vendor" class="w-full border-2 border-gray-300 p-2" value="{{ old('vendor', $soft->vendor) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location', $soft->location) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="payment" class="block text-gray-600 font-bold mb-2">Payment Date:</label>
                                <input type="date" name="payment" id="payment" class="w-full border-2 border-gray-300 p-2" value="{{ old('payment', $soft->payment) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="originalvalue" class="block text-gray-600 font-bold mb-2">Original Value (RM):</label>
                                <input type="number" name="originalvalue" id="originalvalue" class="w-full border-2 border-gray-300 p-2" value="{{ old('originalvalue', $soft->originalvalue) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-600 font-bold mb-2">Status:</label>
                                <select name="status" id="status" class="w-full border-2 border-gray-300 p-2" required>
                                    <option value="Active" {{ $soft->status === 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Unactive" {{ $soft->status === 'Unactive' ? 'selected' : '' }}>Unactive</option>
                                    <option value="Subscribe" {{ $soft->status === 'Subscribe' ? 'selected' : '' }}>Subscribe</option>
                                    <option value="Unsubscribe" {{ $soft->status === 'Unsubscribe' ? 'selected' : '' }}>Unsubscribe</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Update Software
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
