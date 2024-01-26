<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-700">UPS List</h1>
                <a href="{{ route('upowersupps.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add UPS
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>  
                                <tr>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model Type</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Price</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($upowersupps as $upowersupp)
                                <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                                    <td class="py-3 px-6 text-left">{{ $upowersupp->location }}</td>
                                    <td class="py-3 px-6 text-left">{{ $upowersupp->model }}</td>
                                    <td class="py-3 px-6 text-left">{{ $upowersupp->modeltype }}</td>
                                    <td class="py-3 px-6 text-left">{{ $upowersupp->supplier }}</td>
                                    <td class="py-3 px-6 text-left">{{ $upowersupp->purchasedate }}</td>
                                    <td class="py-3 px-6 text-left">{{ $upowersupp->price }}</td>
                                    <td class="py-3 px-6 text-left">{{ $upowersupp->status }}</td>
                                    <td class="py-3 px-6 text-left flex">
                                        <a href="{{ route('upowersupps.show', $upowersupp->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                        <a href="{{ route('upowersupps.edit', [ $upowersupp->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                        <form action="{{ route('upowersupps.destroy', $upowersupp->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this UPS?')">
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
