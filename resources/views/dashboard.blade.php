<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Stat Boxes -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <h3 class="text-gray-600 text-lg">Totaal Gebruikers</h3>
                    <p class="text-4xl font-bold text-blue-600">{{ $totalUsers }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <h3 class="text-gray-600 text-lg">Totaal Evenementen</h3>
                    <p class="text-4xl font-bold text-green-600">{{ $totalEvents }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <h3 class="text-gray-600 text-lg">Totaal Inschrijvingen</h3>
                    <p class="text-4xl font-bold text-purple-600">{{ $totalRegistrations }}</p>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-white p-6 rounded-lg shadow mt-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">Aankomende Evenementen</h3>

                @if ($upcomingEvents->count())
                    <ul class="divide-y divide-gray-200">
                        @foreach ($upcomingEvents as $event)
                            <li class="py-2">
                                <div class="font-medium text-gray-900">{{ $event->title }}</div>
                                <div class="text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }} – {{ $event->location }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Er zijn geen aankomende evenementen.</p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
