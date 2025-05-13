<x-app-layout>
    <h1>{{ $event->title }}</h1>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>

    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
    </form>

    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
</x-app-layout>