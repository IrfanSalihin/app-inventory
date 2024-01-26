<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">Cafeteria Item Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Name:</dt>
                            <dd>{{ $cafeteria->staffname }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Staff Number:</dt>
                            <dd>{{ $cafeteria->staffnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Item:</dt>
                            <dd>{{ $cafeteria->item }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Item Description:</dt>
                            <dd>{{ $cafeteria->itemdescription }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Brand & Model:</dt>
                            <dd>{{ $cafeteria->brandnmodel }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $cafeteria->serialnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Payment Date:</dt>
                            <dd>{{ $cafeteria->payment }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Original Value (RM):</dt>
                            <dd>{{ $cafeteria->originalvalue }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $cafeteria->status }}</dd>
                        </div>

                        <!-- Add additional fields for Cafeteria item details here -->

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Actions:</dt>
                            <dd class="flex space-x-2">
                                <a href="{{ route('cafeterias.edit', $cafeteria->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                                <form action="{{ route('cafeterias.destroy', $cafeteria->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Cafeteria item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                                </form>

                                <!-- Add this button for exporting to Excel -->
                                <a href="{{ route('cafeterias.export', $cafeteria->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
