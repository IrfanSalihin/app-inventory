<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">Hard Disk Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $harddisk->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Branches:</dt>
                            <dd>{{ $harddisk->branches }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Department:</dt>
                            <dd>{{ $harddisk->department }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Name:</dt>
                            <dd>{{ $harddisk->staffname }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Model:</dt>
                            <dd>{{ $harddisk->model }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $harddisk->serialnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Storage Size (TB):</dt>
                            <dd>{{ $harddisk->storagesize }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Supplier:</dt>
                            <dd>{{ $harddisk->supplier }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">PO Number:</dt>
                            <dd>{{ $harddisk->ponumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Invoice Number:</dt>
                            <dd>{{ $harddisk->invoicenumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Price (RM):</dt>
                            <dd>{{ $harddisk->price }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Purchase Date:</dt>
                            <dd>{{ $harddisk->purchasedate }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Purchase Date (Account):</dt>
                            <dd>{{ $harddisk->purchasedateaccount }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Warranty:</dt>
                            <dd>{{ $harddisk->warranty }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Notes:</dt>
                            <dd>{{ $harddisk->notes }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $harddisk->status }}</dd>
                        </div>
                    </dl>

                    <div class="col-span-1 mb-4">
                        <dt class="font-semibold text-gray-600">Actions:</dt>
                        <dd class="flex space-x-2">
                            <a href="{{ route('harddisks.edit', $harddisk->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                            <form action="{{ route('harddisks.destroy', $harddisk->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Harddisk?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                            </form>

                            <!-- Add this button for exporting to Excel -->
                            <a href="{{ route('harddisks.export', $harddisk->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
