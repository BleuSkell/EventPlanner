<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event details') }}
        </h2>
    </x-slot>

    <div class="flex flex-row justify-center">
        <div class="flex flex-col justify-center h-[70vh]">
            <div class="bg-white p-4 rounded-lg">
                <h1 class="text-3xl mt-3"><strong>Event:</strong> {{ $event->title }}</h1>

                <p class="text-lg mt-3"><strong>Description:</strong> {{ $event->description }}</p>

                <p class="text-lg mt-3"><strong>Date:</strong> {{ $event->date }}</p>

                <p class="text-lg mt-3"><strong>Location:</strong> {{ $event->location }}</p>

                <div class="mt-3 flex flex-row justify-between">
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">
                        <button class="bg-green-600 p-2 rounded-lg text-white">
                            Back to Events
                        </button>
                    </a>

                    <div>
                        <a href="{{ route('events.edit', $event->id) }}">
                            <button class="bg-blue-700 p-2 rounded-lg text-white">
                                Edit
                            </button>
                        </a>

                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 p-2 rounded-lg text-white" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>