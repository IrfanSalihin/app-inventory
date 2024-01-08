<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Printer Details</h1>
                <a href="{{ route('printers.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Back to List
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Name:</dt>
                            <dd>{{ $printer->staff_name }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $printer->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Level:</dt>
                            <dd>{{ $printer->level }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Brand:</dt>
                            <dd>{{ $printer->brand }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Model:</dt>
                            <dd>{{ $printer->model }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $printer->serial_number }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Supplier:</dt>
                            <dd>{{ $printer->supplier }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">PO Number:</dt>
                            <dd>{{ $printer->po_number }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Invoice Number:</dt>
                            <dd>{{ $printer->invoice_number }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Price:</dt>
                            <dd>{{ $printer->price }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Purchasing Date:</dt>
                            <dd>{{ $printer->purchasing_date }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Purchasing Date (For Account):</dt>
                            <dd>{{ $printer->purchasing_date_for_account }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Warranty:</dt>
                            <dd>{{ $printer->warranty }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Remarks:</dt>
                            <dd>{{ $printer->remarks }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('printers.edit', $printer->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <form action="{{ route('printers.destroy', $printer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this printer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                        </form>
                        <!-- Add this button for exporting to Excel -->
                        <a href="{{ route('printers.export', $printer->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>