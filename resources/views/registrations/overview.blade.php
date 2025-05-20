<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn inschrijvingen') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if($registrations->isEmpty())
                    <p>U heeft nog geen inschrijvingen.</p>
                @else
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">Event</th>
                                <th class="px-4 py-2 text-left">Tijd</th>
                                <th class="px-4 py-2 text-left">Actie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $eventTitles[$registration->eventIid ?? $registration->event_id] ?? 'Onbekend event' }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ $registration->time }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <form method="POST" action="{{ route('registrations.cancel', $registration->id) }}" onsubmit="return confirm('Weet u zeker dat u deze inschrijving wilt annuleren?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Annuleer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
