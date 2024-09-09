@extends('layout.layout')

@section('title', 'Add Message')

@section('content')

<div class="block pt-14 pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-700 dashoverviews pt-10">
    <div class="h-[83vh] grid grid-cols-8 gap-4">
        <div class="bg-white rounded-lg col-start-3 col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
            <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                <form action="/message" method="POST" class="p-4">
                    @csrf
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 dark:text-gray-300">Message</label>
                        <input type="text" id="" name="message" value="{{ old('message') }}" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                        @error('message')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="time" class="block text-gray-700 dark:text-gray-300">Time</label>
                        <input type="time" id="time" name="time" value="{{ old('time') }}" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                        @error('time')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Message Type</label>
                        <div class="flex items-center">
                            <input type="radio" id="normal" name="type" value="normal" class="mr-2" {{ old('type') == 'normal' ? 'checked' : '' }}>
                            <label for="normal" class="mr-4 text-gray-700 dark:text-gray-300">Normal</label>
                            <input type="radio" id="vip" name="type" value="vip" class="mr-2" {{ old('type') == 'vip' ? 'checked' : '' }}>
                            <label for="vip" class="text-gray-700 dark:text-gray-300">VIP</label>
                        </div>
                        @error('type')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 px-5 py-1 rounded-lg text-white hover:bg-blue-700 duration-500 my-3">Add Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection