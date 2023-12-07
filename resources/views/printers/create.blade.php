<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Add Printer</h1>
                <a href="{{ route('printers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <form action="{{ route('printers.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="location" class="block text-gray-600 font-bold mb-2">Location:</label>
                                <input type="text" name="location" id="location" class="w-full border-2 border-gray-300 p-2" value="{{ old('location') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="level" class="block text-gray-600 font-bold mb-2">Level:</label>
                                <input type="text" name="level" id="level" class="w-full border-2 border-gray-300 p-2" value="{{ old('level') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="staff_name" class="block text-gray-600 font-bold mb-2">Staff Name:</label>
                                <input type="text" name="staff_name" id="staff_name" class="w-full border-2 border-gray-300 p-2" value="{{ old('staff_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="brand" class="block text-gray-600 font-bold mb-2">Brand:</label>
                                <input type="text" name="brand" id="brand" class="w-full border-2 border-gray-300 p-2" value="{{ old('brand') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block text-gray-600 font-bold mb-2">Model:</label>
                                <input type="text" name="model" id="model" class="w-full border-2 border-gray-300 p-2" value="{{ old('model') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="serial_number" class="block text-gray-600 font-bold mb-2">Serial Number:</label>
                                <input type="text" name="serial_number" id="serial_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('serial_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="supplier" class="block text-gray-600 font-bold mb-2">Supplier:</label>
                                <input type="text" name="supplier" id="supplier" class="w-full border-2 border-gray-300 p-2" value="{{ old('supplier') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="po_number" class="block text-gray-600 font-bold mb-2">PO Number:</label>
                                <input type="text" name="po_number" id="po_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('po_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="invoice_number" class="block text-gray-600 font-bold mb-2">Invoice Number:</label>
                                <input type="text" name="invoice_number" id="invoice_number" class="w-full border-2 border-gray-300 p-2" value="{{ old('invoice_number') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-600 font-bold mb-2">Price (RM):</label>
                                <input type="number" name="price" id="price" class="w-full border-2 border-gray-300 p-2" value="{{ old('price') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasing_date" class="block text-gray-600 font-bold mb-2">Purchasing Date:</label>
                                <input type="date" name="purchasing_date" id="purchasing_date" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasing_date') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="purchasing_date_for_account" class="block text-gray-600 font-bold mb-2">Purchasing Date for Account:</label>
                                <input type="date" name="purchasing_date_for_account" id="purchasing_date_for_account" class="w-full border-2 border-gray-300 p-2" value="{{ old('purchasing_date_for_account') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="warranty" class="block text-gray-600 font-bold mb-2">Warranty:</label>
                                <input type="text" name="warranty" id="warranty" class="w-full border-2 border-gray-300 p-2" value="{{ old('warranty') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="remarks" class="block text-gray-600 font-bold mb-2">Remarks:</label>
                                <textarea name="remarks" id="remarks" class="w-full border-2 border-gray-300 p-2" rows="3">{{ old('remarks') }}</textarea>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save Printer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>