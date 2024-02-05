<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">Photostate Machine Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $photostatemac->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Level:</dt>
                            <dd>{{ $photostatemac->level }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Model:</dt>
                            <dd>{{ $photostatemac->model }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Type:</dt>
                            <dd>{{ $photostatemac->type }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $photostatemac->serialnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Ownership:</dt>
                            <dd>{{ $photostatemac->ownership }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $photostatemac->status }}</dd>
                        </div>
                    </dl>

                    <div class="col-span-1 mb-4">
                        <dt class="font-semibold text-gray-600">Actions:</dt>
                        <dd class="flex space-x-2">
                            <a href="{{ route('photostatemacs.edit', $photostatemac->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                            <form action="{{ route('photostatemacs.destroy', $photostatemac->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Photostatemac?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                            </form>

                            <!-- Add this button for exporting to Excel -->
                            <a href="{{ route('photostatemacs.export', $photostatemac->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
