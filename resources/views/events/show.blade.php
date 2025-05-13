<x-app-layout>
    <h1>{{ $event->title }}</h1>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
</x-app-layout>