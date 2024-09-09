@extends('layout.layout')

@section('title', 'Add Room')

@section('content')
<div class="block pt-14 pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-700 flex justify-center items-center">
    <div class="bg-white rounded-lg px-4 py-2 dark:bg-gray-600 duration-300">
        <form action="/room" method="POST">
            @csrf
            <div class="mb-4">
                <label for="room_name" class="block text-gray-700 dark:text-gray-300">Room Name</label>
                <input type="text" id="room_name" name="room_name" value="{{ old('room_name') }}" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300">
                @error('room_name')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="room_status" class="block text-gray-700 dark:text-gray-300">Room Status</label>
                <select id="room_status" name="room_status" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300">
                    <option value="default" selected disabled>Select Room Status</option>
                    <option value="available" {{ old('room_status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="occupied" {{ old('room_status') == 'occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="maintenance" {{ old('room_status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
                @error('room_status')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="number" class="block text-gray-700 dark:text-gray-300">Number</label>
                <input type="number" id="number" name="number" value="{{ old('number') }}" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300">
                @error('number')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="room_price" class="block text-gray-700 dark:text-gray-300">Room Price</label>
                <input type="number" id="room_price" name="room_price" value="{{ old('room_price') }}" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300">
                @error('room_price')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 px-5 py-2 rounded-lg text-white hover:bg-blue-700 duration-500">Add Room</button>
            </div>
        </form>
    </div>
</div>

@endsection