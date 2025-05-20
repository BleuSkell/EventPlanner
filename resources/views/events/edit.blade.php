<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit event') }}
        </h2>
    </x-slot>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="max-w-md mx-auto mt-8 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block mb-1 font-medium text-gray-700">Event title</label>
            <input type="text" name="title" id="title" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ $event->title }}">
        </div>
        <div class="mb-4">
            <label for="description" class="block mb-1 font-medium text-gray-700">Description</label>
            <textarea name="description" id="description"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $event->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="date" class="block mb-1 font-medium text-gray-700">Date</label>
            <input type="date" name="date" id="date" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ $event->date }}">
        </div>
        <div class="mb-6">
            <label for="location" class="block mb-1 font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ $event->location }}">
        </div>
        <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded transition">Update</button>
    </form>
</x-app-layout>