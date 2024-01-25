<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Barcode Scanner List</h1>
                <a href="{{ route('barcodescanners.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Barcode Scanner
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>  
                                <tr>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Branches</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Department</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Name</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barcodescanners as $barcodescanner)
                                <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                                    <td class="py-3 px-6 text-left">{{ $barcodescanner->location }}</td>
                                    <td class="py-3 px-6 text-left">{{ $barcodescanner->branches }}</td>
                                    <td class="py-3 px-6 text-left">{{ $barcodescanner->department }}</td>
                                    <td class="py-3 px-6 text-left">{{ $barcodescanner->staffname }}</td>
                                    <td class="py-3 px-6 text-left">{{ $barcodescanner->purchasedate }}</td>
                                    <td class="py-3 px-6 text-left">{{ $barcodescanner->status }}</td>
                                    <td class="py-3 px-6 text-left flex">
                                        <a href="{{ route('barcodescanners.show', $barcodescanner->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                        <a href="{{ route('barcodescanners.edit', ['barcodescanner' => $barcodescanner->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <form action="{{ route('barcodescanners.destroy', $barcodescanner->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Barcode Scanner?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
