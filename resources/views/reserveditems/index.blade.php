<!-- resources/views/reserved_items/index.blade.php -->

<x-app-layout>

<h1 class="text-3xl font-bold text-gray-700">Reserved Items</h1>
<div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <div class="overflow-x-auto">
  
                    <h2>Reserved Desktops</h2>
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Name</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Number</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">CPU Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Account Purchase Date</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($desktops as $desktop)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $desktop->staff_name }}</td>
                        <td class="py-3 px-6 text-left">{{ $desktop->staff_number }}</td>
                        <td class="py-3 px-6 text-left">{{ $desktop->location }}</td>
                        <td class="py-3 px-6 text-left">{{ $desktop->cpu_model }}</td>
                        <td class="py-3 px-6 text-left">{{ $desktop->account_purchase_date }}</td>
                        <td class="py-3 px-6 text-left">{{ $desktop->status }}</td>
                        <td class="py-3 px-6 text-left flex"> <!-- Added flex class here -->
                            <a href="{{ route('desktops.show', $desktop->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('desktops.edit', ['desktop' => $desktop->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('desktops.destroy', $desktop->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this desktop?')">
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


    
                    
    <h2>Reserved Notebooks</h2>
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Name</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Number</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Serial Number</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notebooks as $notebook)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $notebook->staff_name }}</td>
                        <td class="py-3 px-6 text-left">{{ $notebook->staff_number }}</td>
                        <td class="py-3 px-6 text-left">{{ $notebook->location }}</td>
                        <td class="py-3 px-6 text-left">{{ $notebook->notebook_details_model }}</td>
                        <td class="py-3 px-6 text-left">{{ $notebook->notebook_details_serial_number }}</td>
                        <td class="py-3 px-6 text-left">{{ $notebook->status }}</td>
                        <td class="py-3 px-6 text-left flex">
                            <a href="{{ route('notebooks.show', $notebook->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('notebooks.edit', $notebook->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('notebooks.destroy', $notebook->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notebook?')">
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


                    
    <h2>Reserved Printers</h2>
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Name</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Serial Number</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($printers as $printer)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $printer->staff_name }}</td>
                        <td class="py-3 px-6 text-left">{{ $printer->location }}</td>
                        <td class="py-3 px-6 text-left">{{ $printer->model }}</td>
                        <td class="py-3 px-6 text-left">{{ $printer->serial_number }}</td>
                        <td class="py-3 px-6 text-left">{{ $printer->status }}</td>
                        <td class="py-3 px-6 text-left flex">
                            <a href="{{ route('printers.show', $printer->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('printers.edit', $printer->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('printers.destroy', $printer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this printer?')">
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



    <h2>Reserved Smartphones</h2>
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>  
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Type</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Price</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($smartphones as $phone)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $phone->location }}</td>
                        <td class="py-3 px-6 text-left">{{ $phone->model }}</td>
                        <td class="py-3 px-6 text-left">{{ $phone->type }}</td>
                        <td class="py-3 px-6 text-left">{{ $phone->supplier }}</td>
                        <td class="py-3 px-6 text-left">{{ $phone->purchasedate }}</td>
                        <td class="py-3 px-6 text-left">{{ $phone->price }}</td>
                        <td class="py-3 px-6 text-left">{{ $phone->status }}</td>
                        <td class="py-3 px-6 text-left flex">
                            <a href="{{ route('smartphones.show', $phone->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('smartphones.edit', ['smartphone' => $phone->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('smartphones.destroy', $phone->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this smartphone?')">
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



            <h2>Reserved Camera</h2>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Name</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date (Account)</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cameras as $cameraItem)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $cameraItem->location }}</td>
                        <td class="py-3 px-6 text-left">{{ $cameraItem->staffname }}</td>
                        <td class="py-3 px-6 text-left">{{ $cameraItem->model }}</td>
                        <td class="py-3 px-6 text-left">{{ $cameraItem->supplier }}</td>
                        <td class="py-3 px-6 text-left">{{ $cameraItem->purchasedateaccount }}</td>
                        <td class="py-3 px-6 text-left">{{ $cameraItem->status }}</td>
                        <td class="py-3 px-6 text-left flex">
                            <a href="{{ route('cameras.show', $cameraItem->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('cameras.edit', ['camera' => $cameraItem->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('cameras.destroy', $cameraItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this camera?')">
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



            <h2>Reserved Ipad</h2>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>  
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Department</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Name</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date (Account)</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Price</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ipads as $ipadItem)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $ipadItem->department }}</td>
                        <td class="py-3 px-6 text-left">{{ $ipadItem->name }}</td>
                        <td class="py-3 px-6 text-left">{{ $ipadItem->supplier }}</td>
                        <td class="py-3 px-6 text-left">{{ $ipadItem->purchasedateaccount }}</td>
                        <td class="py-3 px-6 text-left">{{ $ipadItem->price }}</td>
                        <td class="py-3 px-6 text-left">{{ $ipadItem->status }}</td>
                        <td class="py-3 px-6 text-left flex">
                            <a href="{{ route('ipads.show', $ipadItem->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('ipads.edit', ['ipad' => $ipadItem->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('ipads.destroy', $ipadItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this iPad?')">
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



            <h2>Reserved Voice Recorder</h2>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>  
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date (Account)</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Price</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($voicerecorders as $voicerecorderItem)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $voicerecorderItem->location }}</td>
                        <td class="py-3 px-6 text-left">{{ $voicerecorderItem->model }}</td>
                        <td class="py-3 px-6 text-left">{{ $voicerecorderItem->supplier }}</td>
                        <td class="py-3 px-6 text-left">{{ $voicerecorderItem->purchasedateaccount }}</td>
                        <td class="py-3 px-6 text-left">{{ $voicerecorderItem->price }}</td>
                        <td class="py-3 px-6 text-left">{{ $voicerecorderItem->status }}</td>
                        <td class="py-3 px-6 text-left flex">
                            <a href="{{ route('voicerecorders.show', $voicerecorderItem->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('voicerecorders.edit', ['voicerecorder' => $voicerecorderItem->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('voicerecorders.destroy', $voicerecorderItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Voicerecorder?')">
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



            <h2>Reserved Projector</h2>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>  
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Price</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projectors as $projector)
                    <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                        <td class="py-3 px-6 text-left">{{ $projector->location }}</td>
                        <td class="py-3 px-6 text-left">{{ $projector->model }}</td>
                        <td class="py-3 px-6 text-left">{{ $projector->supplier }}</td>
                        <td class="py-3 px-6 text-left">{{ $projector->purchasedate }}</td>
                        <td class="py-3 px-6 text-left">{{ $projector->price }}</td>
                        <td class="py-3 px-6 text-left">{{ $projector->status }}</td>
                        <td class="py-3 px-6 text-left flex">
                            <a href="{{ route('projectors.show', $projector->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                            <a href="{{ route('projectors.edit', ['projector' => $projector->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('projectors.destroy', $projector->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this projector?')">
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



            <h2>Reserved MyCard Reader</h2>
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
                    @foreach ($mycardreaders as $reader)
                        <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                            <td class="py-3 px-6 text-left">{{ $reader->location }}</td>
                            <td class="py-3 px-6 text-left">{{ $reader->branches }}</td>
                            <td class="py-3 px-6 text-left">{{ $reader->department }}</td>
                            <td class="py-3 px-6 text-left">{{ $reader->staffname }}</td>
                            <td class="py-3 px-6 text-left">{{ $reader->purchasedate }}</td>
                            <td class="py-3 px-6 text-left">{{ $reader->status }}</td>
                            <td class="py-3 px-6 text-left flex">
                                <a href="{{ route('mycardreaders.show', $reader->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                <a href="{{ route('mycardreaders.edit', ['mycardreader' => $reader->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                <form action="{{ route('mycardreaders.destroy', $reader->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Mycardreader?')">
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




    <h2>Reserved Barcode Scanner</h2>
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




            <h2>Reserved Walkie Talkie</h2>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>  
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date (Account)</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Price</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Warranty</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($walkietalkies as $walkietalkie)
                        <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                            <td class="py-3 px-6 text-left">{{ $walkietalkie->location }}</td>
                            <td class="py-3 px-6 text-left">{{ $walkietalkie->model }}</td>
                            <td class="py-3 px-6 text-left">{{ $walkietalkie->purchasedateaccount }}</td>
                            <td class="py-3 px-6 text-left">{{ $walkietalkie->price }}</td>
                            <td class="py-3 px-6 text-left">{{ $walkietalkie->warranty }}</td>
                            <td class="py-3 px-6 text-left">{{ $walkietalkie->status }}</td>
                            <td class="py-3 px-6 text-left flex">
                                <a href="{{ route('walkietalkies.show', ['id' => $walkietalkie->id]) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                <a href="{{ route('walkietalkies.edit', ['id' => $walkietalkie->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                                <form action="{{ route('walkietalkies.destroy', ['id' => $walkietalkie->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Walkietalkie?')">
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



    <h2>Reserved UPS</h2>
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
                                <a href="{{ route('upowersupps.edit', [$upowersupp->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
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



    <h2>Reserved Hard Disk</h2>
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>  
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Staff Name</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date (Account)</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($harddisks as $harddisk)
                        <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                            <td class="py-3 px-6 text-left">{{ $harddisk->location }}</td>
                            <td class="py-3 px-6 text-left">{{ $harddisk->staffname }}</td>
                            <td class="py-3 px-6 text-left">{{ $harddisk->model }}</td>
                            <td class="py-3 px-6 text-left">{{ $harddisk->supplier }}</td>
                            <td class="py-3 px-6 text-left">{{ $harddisk->purchasedateaccount }}</td>
                            <td class="py-3 px-6 text-left">{{ $harddisk->status }}</td>
                            <td class="py-3 px-6 text-left flex">
                                <a href="{{ route('harddisks.show', $harddisk->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                <a href="{{ route('harddisks.edit', ['harddisk' => $harddisk->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                <form action="{{ route('harddisks.destroy', $harddisk->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this harddisk?')">
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



    <h2>Reserved Cafeteria</h2>
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


            <h2>Reserved Other Product</h2>
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
    <div class="p-6 text-gray-800">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>  
                    <tr>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Location</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Model</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Supplier</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Purchase Date</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Price</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Status</th>
                        <th class="py-3 px-6 text-left bg-indigo-800 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($others as $other)
                        <tr class="{{ $loop->even ? 'bg-indigo-100' : 'bg-white' }}">
                            <td class="py-3 px-6 text-left">{{ $other->location }}</td>
                            <td class="py-3 px-6 text-left">{{ $other->model }}</td>
                            <td class="py-3 px-6 text-left">{{ $other->supplier }}</td>
                            <td class="py-3 px-6 text-left">{{ $other->purchasedate }}</td>
                            <td class="py-3 px-6 text-left">{{ $other->price }}</td>
                            <td class="py-3 px-6 text-left">{{ $other->status }}</td>
                            <td class="py-3 px-6 text-left flex">
                                <a href="{{ route('others.show', $other->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                                <a href="{{ route('others.edit', ['other' => $other->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                                <form action="{{ route('others.destroy', $other->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this specified product?')">
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
</div></div>

    </x-app-layout>


