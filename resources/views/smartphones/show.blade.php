<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">Smartphone Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $smartphone->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Model:</dt>
                            <dd>{{ $smartphone->model }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Type:</dt>
                            <dd>{{ $smartphone->type }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $smartphone->serialnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">RAM:</dt>
                            <dd>{{ $smartphone->ram }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">ROM:</dt>
                            <dd>{{ $smartphone->rom }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Color:</dt>
                            <dd>{{ $smartphone->color }}</dd>
                        </div>

                        <!-- Add more fields for other smartphone details -->

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Supplier:</dt>
                            <dd>{{ $smartphone->supplier }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Purchase Date:</dt>
                            <dd>{{ $smartphone->purchasedate }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Price:</dt>
                            <dd>{{ $smartphone->price }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Warranty:</dt>
                            <dd>{{ $smartphone->warranty }}</dd>
                        </div>

                        <div class="mb-4 col-span-1">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $smartphone->status }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex space-x-4">
                        <a href="{{ route('smartphones.edit', $smartphone->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                        <form action="{{ route('smartphones.destroy', $smartphone->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this smartphone?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                        </form>
                        <!-- Add this button for exporting to Excel -->
                        <a href="{{ route('smartphones.export', $smartphone->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
