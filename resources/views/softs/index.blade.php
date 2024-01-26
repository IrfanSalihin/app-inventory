<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Software List</h1>
                <a href="{{ route('softs.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Software
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>  
                                <tr>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Item</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Vendor</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Payment Date</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Original Value (RM)</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($softs as $soft)
                                <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                                    <td class="py-3 px-6 text-left">{{ $soft->item }}</td>
                                    <td class="py-3 px-6 text-left">{{ $soft->vendor }}</td>
                                    <td class="py-3 px-6 text-left">{{ $soft->location }}</td>
                                    <td class="py-3 px-6 text-left">{{ $soft->payment }}</td>
                                    <td class="py-3 px-6 text-left">{{ $soft->originalvalue }}</td>
                                    <td class="py-3 px-6 text-left">{{ $soft->status }}</td>
                                    <td class="py-3 px-6 text-left flex">
                                        <a href="{{ route('softs.show', $soft->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                        <a href="{{ route('softs.edit', ['soft' => $soft->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <form action="{{ route('softs.destroy', $soft->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this software?')">
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
