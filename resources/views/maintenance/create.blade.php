@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>  
    <script>
        console.log("error");
    </script>
@endif

<div id="createMaster" class="inset-0 bg-white flex justify-center items-start p-4 h-[95%]">
    <div class="bg-white p-6 rounded-md w-96">
        <h2 class="text-xl font-bold mb-4">Maintenance Record</h2>

        <form id="editForm" action="{{ route('maintenance.store', ['assetcode' => $assetcode]) }}" method="POST">
            @csrf <!-- CSRF protection -->

            <!-- Input fields for master data -->
            <div class="mb-4">
                <label for="assetcode" class="block text-sm font-semibold">Asset Code</label>
                <select id="assetcode" name="assetcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="{{ $assetcode }}">{{ $assetcode }}</option>
                </select>  
            </div>

            <div class="mb-4">  
                <label for="picadded" class="block text-sm font-semibold">PIC</label>
                <select id="picadded" name="picadded" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($user as $assets)
                        <option value="{{ $assets['name'] }}">{{ $assets['name'] }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label for="notesaction" class="block text-sm font-semibold">Notes</label>
                <textarea type="text" id="notesaction" name="notesaction" class="w-full p-2 border rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label for="notessparepart" class="block text-sm font-semibold">Sparepart</label>
                <textarea type="text" id="notessparepart" name="notessparepart" class="w-full p-2 border rounded" required></textarea>
            </div>  

            <div class="mb-4">
                <label for="notesresult" class="block text-sm font-semibold">Result</label>
                <textarea type="text" id="notesresult" name="notesresult" class="w-full p-2 border rounded" required></textarea>
            </div>  

            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" onclick="window.location.href='{{ route( 'maintenance.store', ['assetcode' => $assetcode]) }}'" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Back</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
</div>


@endsection
