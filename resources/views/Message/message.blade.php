@extends('layout.layout')

@section('title', 'Message')

@section('content')
    <div class="block pt-14 pb-5 px-5 ml-64 bg-gray-300 dark:bg-gray-700 dashoverviews pt-10">
        <div class="h-[83vh] grid grid-cols-8 gap-4">
            <div class="bg-white rounded-lg col-start-2 col-span-6 row-span-2 px-4 py-2 dark:bg-gray-600 duration-300">
                <div class="relative overflow-x-auto shadow-md dark:shadow-none sm:rounded-lg">
                <div class="flex justify-end">
                    <a href="/message/create">
                        <button type="button" class="bg-blue-500 px-5 py-1 rounded-lg text-white hover:bg-blue-700 duration-500 my-3">Add Message</button>
                    </a>
                </div>    
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="w-full text-white bg-gray-500 px-5 py-3">Unread Message</div>
                        <tbody id="table-body-instructor">
                            @foreach ($messages as $message)
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
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-10 mb-5 flex justify-center">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection