@extends('layout.layout')

@section('title', 'Add Room')

@section('content')
<div class="block pt-14 pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-700 dashoverviews pt-10">
    <div class="h-[83vh] grid grid-cols-8 gap-4">
        <div class="bg-white rounded-lg col-start-3 col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
            <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                <div class="w-full text-white bg-violet-500 px-5 py-3">Add Appointment</div>
                <form action="/appointment" method="POST" class="px-5 py-5">
                    @csrf
                    <div class="mb-4">
                        <label for="doctor_name" class="block text-gray-700 dark:text-gray-300">Doctor Name</label>
                        <input type="text" name="doctor_name" id="doctor_name" value="{{ old('doctor_name') }}" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300">
                        @error('doctor_name')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="room_no" class="block text-gray-700 dark:text-gray-300">Room Number</label>
                        <input type="text" name="room_no" id="room_no" value="{{ old('room_no') }}" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300" >
                        @error('room_no')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 dark:text-gray-300">Date</label>
                        <input type="date" name="date" id="date" value="{{ old('date') }}" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300" >
                        @error('date')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="time" class="block text-gray-700 dark:text-gray-300">Time</label>
                        <input type="time" name="time" id="time" value="{{ old('time') }}" class="w-full px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-300" >
                        @error('time')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 px-5 py-2 rounded-lg text-white hover:bg-blue-700 duration-500">Add Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection