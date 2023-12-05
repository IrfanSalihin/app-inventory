<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold text-green-700">User List</h1>
                <a href="{{ route('users.register') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add User
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Name</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Email</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Role</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Permission</th>
                                    <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                                    <td class="py-3 px-6 text-left">{{ $user->name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->email }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->role }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->permission }}</td>
                                    <td class="py-3 px-6 text-left">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none">
                                                Delete
                                            </button>
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