@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
<div class="block pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-700 dashoverviews pt-5">
        <div class="grid grid-cols-8 gap-4">
            <div class="bg-white rounded-lg col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
                <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="w-full text-white bg-red-500 px-5 py-3">Room Status</div>
                        <tbody id="table-body-instructor">
                            @foreach ($rooms as $room)
                            @if($loop->iteration == 6)
                            @break
                            @endif
                            @if($room)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $room->room_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $room->room_status }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $room->number }}
                                </td>
                                <td class="px-6 py-4 font-bold">
                                    $ {{ $room->room_price }}
                                </td>
                                <td class="flex justify-end items-center pt-1.5">
                                    <div class="flex">
                                        <a href="/room/{{ $room->id }}/edit">
                                            <button type="button" class="bg-green-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-green-700 duration-300 my-2">Edit</button>
                                        </a>
                                        <form action="/room/{{ $room->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-red-700 duration-300 my-2">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end">
                        <a href="/room/create">
                            <button class="mr-2 bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">Add Room</button>
                        </a>
                        <a href="/room">
                            <button class="bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">See More ></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
                <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="w-full text-white bg-gray-500 px-5 py-3">Unread Message</div>
                        <tbody id="table-body-instructor">
                            @foreach ($messages as $message)
                            @if($loop->iteration == 6)
                            @break
                            @endif
                            @if($message)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $message->message }}   
                                    @if ($message->type === "vip")
                                        <div class="mt-2">
                                            <svg class="w-5 h-5 text-red-500 inline" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="#ff0000" d="M5 21V4h9l.4 2H20v10h-7l-.4-2H7v7z"/></svg>
                                            <span class="text-red-500">VIP Message</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($message->time)->diffForHumans() }}
                                </td>
                                <td class="flex justify-end items-center pt-1.5">
                                    <div class="flex">
                                        <a href="/message/{{ $message->id }}/edit">
                                            <button type="button" class="bg-green-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-green-700 duration-300 my-2">Edit</button>
                                        </a>
                                        <form action="/message/{{ $message->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-red-700 duration-300 my-2">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end">
                        <a href="/message/create">
                            <button class="mr-2 bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">Add Message</button>
                        </a>
                        <a href="/message">
                            <button class="bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">See More ></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
                <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="w-full text-white bg-blue-500 px-5 py-3">Drug Store</div>
                        <tbody id="table-body-instructor">
                            @foreach ($drugstores as $drugstore)
                            @if($loop->iteration == 6)
                            @break
                            @endif
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $drugstore->drug_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $drugstore->unit }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $drugstore->quantity }}
                                </td>
                                <td class="px-6 py-4">
                                    $ {{ $drugstore->price }}/per item
                                </td>
                                <td class="flex justify-end items-center pt-1.5">
                                    <div class="flex">
                                        <a href="/drugstore/{{ $drugstore->id }}/edit">
                                            <button type="button" class="bg-green-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-green-700 duration-300 my-2">Edit</button>
                                        </a>
                                        <form action="/drugstore/{{ $drugstore->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-red-700 duration-300 my-2">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end">
                        <a href="/drugstore/create">
                            <button class="mr-2 bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">Add Drug</button>
                        </a>
                        <a href="/drugstore">
                            <button class="bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">See More ></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg col-span-4 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
                <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="w-full text-white bg-violet-500 px-5 py-3">Appointment</div>
                        <tbody id="table-body-instructor">
                            @foreach ($appointments as $appointment)
                            @if($loop->iteration == 6)
                            @break
                            @endif
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $appointment->doctor_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $appointment->room_no }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $appointment->date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $appointment->time }}
                                </td>
                                <td class="flex justify-end items-center pt-1.5">
                                    <div class="flex">
                                        <a href="/appointment/{{ $appointment->id }}/edit">
                                            <button type="button" class="bg-green-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-green-700 duration-300 my-2">Edit</button>
                                        </a>
                                        <form action="/appointment/{{ $appointment->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 w-20 px-5 mr-2 py-0.5 rounded-md text-black hover:bg-red-700 duration-300 my-2">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end">
                        <a href="/appointment/create">
                            <button class="mr-2 bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">Add Appointment</button>
                        </a>
                        <a href="/appointment">
                            <button class="bg-gray-200 px-5 py-2 rounded-xl my-5 text-blue-700 hover:bg-gray-400 dark:hover:bg-gray-800 dark:text-blue-600 dark:bg-gray-700 duration-500">See More ></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection