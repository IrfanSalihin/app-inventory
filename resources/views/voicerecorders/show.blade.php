<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 text-gray-800">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6">Voicerecorder Details</h1>

                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Location:</dt>
                            <dd>{{ $voicerecorder->location }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Place:</dt>
                            <dd>{{ $voicerecorder->place }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Level:</dt>
                            <dd>{{ $voicerecorder->level }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Model:</dt>
                            <dd>{{ $voicerecorder->model }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Serial Number:</dt>
                            <dd>{{ $voicerecorder->serialnumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Description:</dt>
                            <dd>{{ $voicerecorder->decription }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Supplier:</dt>
                            <dd>{{ $voicerecorder->supplier }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">PO Number:</dt>
                            <dd>{{ $voicerecorder->ponumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Invoice Number:</dt>
                            <dd>{{ $voicerecorder->invoicenumber }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Price (RM):</dt>
                            <dd>{{ $voicerecorder->price }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Purchase Date:</dt>
                            <dd>{{ $voicerecorder->purchasedate }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Purchase Date (Account):</dt>
                            <dd>{{ $voicerecorder->purchasedateaccount }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Warranty:</dt>
                            <dd>{{ $voicerecorder->warranty }}</dd>
                        </div>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Status:</dt>
                            <dd>{{ $voicerecorder->status }}</dd>
                        </div>
                        </dl>

                        <div class="col-span-1 mb-4">
                            <dt class="font-semibold text-gray-600">Actions:</dt>
                            <dd class="flex space-x-2">
                                <a href="{{ route('voicerecorders.edit', $voicerecorder->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                
                                <form action="{{ route('voicerecorders.destroy', $voicerecorder->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Voicerecorder?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Delete</button>
                                </form>
                                <!-- Add this button for exporting to Excel -->
                        <a href="{{ route('voicerecorders.export', $voicerecorder->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Export to Excel</a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
