<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">Cafeteria Item List</h1>
                <a href="{{ route('cafeterias.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Cafeteria Item
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>  
                                <tr>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Name</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Item</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Brand & Model</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Payment Date</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Original Value (RM)</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cafeterias as $cafeteria)
                                <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                                    <td class="py-3 px-6 text-left">{{ $cafeteria->staffname }}</td>
                                    <td class="py-3 px-6 text-left">{{ $cafeteria->item }}</td>
                                    <td class="py-3 px-6 text-left">{{ $cafeteria->brandnmodel }}</td>
                                    <td class="py-3 px-6 text-left">{{ $cafeteria->payment }}</td>
                                    <td class="py-3 px-6 text-left">{{ $cafeteria->originalvalue }}</td>
                                    <td class="py-3 px-6 text-left">{{ $cafeteria->status }}</td>
                                    <td class="py-3 px-6 text-left flex">
                                        <a href="{{ route('cafeterias.show', $cafeteria->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                        <a href="{{ route('cafeterias.edit', ['cafeteria' => $cafeteria->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <form action="{{ route('cafeterias.destroy', $cafeteria->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this cafeteria item?')">
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
