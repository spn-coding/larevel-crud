@extends('layout.layout')

@section('title', 'Edit Drug')

@section('content')

<div class="block pt-14 pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-700 dashoverviews pt-10">
    <div class="h-[83vh] grid grid-cols-8 gap-4">
        <div class="bg-white rounded-lg col-start-3 col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
            <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                <form action="/drugstore/{{ $drugstore->id }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="drug_name" class="block text-gray-700 dark:text-gray-300">Drug Name</label>
                        <input type="text" id="drug_name" name="drug_name" value="{{ $drugstore->drug_name }}" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                        @error('drug_name')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="unit" class="block text-gray-700 dark:text-gray-300">Unit</label>
                        <input type="text" id="unit" name="unit" value="{{ $drugstore->unit }}" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                        @error('unit')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 dark:text-gray-300">Quantity</label>
                        <input type="number" id="quantity" name="quantity" value="{{ $drugstore->quantity }}" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                        @error('quantity')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 dark:text-gray-300">Price</label>
                        <input type="number" id="price" name="price" value="{{ $drugstore->price }}" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none dark:bg-gray-800 dark:text-gray-300">
                        @error('price')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 px-5 py-1 rounded-lg text-white hover:bg-blue-700 duration-500 my-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection