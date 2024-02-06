<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">Other Product Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $other->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Place:</dt>
                            <dd>{{ $other->place }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Model:</dt>
                            <dd>{{ $other->model }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Item:</dt>
                            <dd>{{ $other->item }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Unit:</dt>
                            <dd>{{ $other->unit }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $other->serialnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Supplier:</dt>
                            <dd>{{ $other->supplier }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Purchase Date:</dt>
                            <dd>{{ $other->purchasedate }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Price (RM):</dt>
                            <dd>{{ $other->price }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $other->status }}</dd>
                        </div>
                    </dl>

                    <div class="col-span-1 mb-4">
                        <dt class="font-semibold text-gray-600">Actions:</dt>
                        <dd class="flex space-x-2">
                            <a href="{{ route('others.edit', $other->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                            <form action="{{ route('others.destroy', $other->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                            </form>

                            <!-- Add this button for exporting to Excel -->
                            <a href="{{ route('others.export', $other->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
