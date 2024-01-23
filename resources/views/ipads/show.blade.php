<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">iPad Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Department:</dt>
                            <dd>{{ $ipad->department }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Name:</dt>
                            <dd>{{ $ipad->name }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $ipad->serialnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Storage Size:</dt>
                            <dd>{{ $ipad->storagesize }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Supplier:</dt>
                            <dd>{{ $ipad->supplier }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Purchase Date:</dt>
                            <dd>{{ $ipad->purchasedate }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Price:</dt>
                            <dd>{{ $ipad->price }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Warranty:</dt>
                            <dd>{{ $ipad->warranty }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Notes:</dt>
                            <dd>{{ $ipad->notes }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $ipad->status }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('ipads.edit', $ipad->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                        <form action="{{ route('ipads.destroy', $ipad->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this iPad?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                        </form>
                        <!-- Add this button for exporting to Excel -->
                        <a href="{{ route('ipads.export', $ipad->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
