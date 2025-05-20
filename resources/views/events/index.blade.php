<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="flex flex-row justify-center">
        <div class="flex flex-col justify-center h-[80vh]">
            
            <a href="{{ route('events.create') }}" class="w-[7rem]">
                <button class="bg-blue-500 p-2 rounded-lg text-white">
                    Create Event
                </button>
            </a>
            
            <table class="table mt-3 border-collapse border border-gray-500 text-center">
                <thead>
                    <tr>
                        <th class="border border-gray-500 p-2">Title</th>
                        <th class="border border-gray-500 p-2">Date</th>
                        <th class="border border-gray-500 p-2">Location</th>
                        <th class="border border-gray-500 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td class="border border-gray-500 p-2">{{ $event->title }}</td>
                            <td class="border border-gray-500 p-2">{{ $event->date }}</td>
                            <td class="border border-gray-500 p-2">{{ $event->location }}</td>
                            <td class="border border-gray-500 p-2">
                                <a href="{{ route('events.show', $event->id) }}" class="text-yellow-600">Info</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>