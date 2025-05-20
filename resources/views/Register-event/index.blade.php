<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Success message --}}
    @if(session('success_auto') || session('success_motor') || session('success_huizen'))
        <div style="color:green; margin-top:10px;">
            {{ session('success_auto') ?? session('success_motor') ?? session('success_huizen') }}
        </div>
    @endif

    {{-- Error message for double booking --}}
    @if($errors->has('time'))
        <div style="color:red; margin-top:10px;">
            {{ $errors->first('time') }}
        </div>
    @endif

    <!-- Event 1 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="1">
        <label for="Event1"></label>
        <select id="Event1" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Auto?')">Inschrijven Event (Quia veniam repellat odit.)</button>
    </form>
    <br><br>

    <!-- Event 2 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="2">
        <label for="Event2"></label>
        <select id="Event2" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Motor?')">Inschrijven Event (Culpa cumque modi quas accusamus.)</button>
    </form>
    <br><br>

    <!-- Event 3 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="3">
        <label for="Event3"></label>
        <select id="Event3" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Enim debitis suscipit.)</button>
    </form>
    <br><br>

    <!-- Event 4 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="4">
        <label for="Event4"></label>
        <select id="Event4" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Odio quo consequatur.)</button>
    </form>
    <br><br>

    <!-- Event 5 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="5">
        <label for="Event5"></label>
        <select id="Event5" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Sit dicta velit quis laboriosam)</button>
    </form>
    <br><br>

    <!-- Event 6 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="6">
        <label for="Event6"></label>
        <select id="Event6" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Nulla sit ut vel.)</button>
    </form>
    <br><br>

    <!-- Event 7 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="7">
        <label for="Event7"></label>
        <select id="Event7" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Rerum placeat sed quo.)</button>
    </form>
    <br><br>

    <!-- Event 8 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="8">
        <label for="Event8"></label>
        <select id="Event8" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Qui qui hic dolorem.)</button>
    </form>
    <br><br>

    <!-- Event 9 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="9">
        <label for="Event9"></label>
        <select id="Event9" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Facilis enim qui.)</button>
    </form>
    <br><br>

    <!-- Event 10 -->
    <form method="POST" action="{{ route('register-event') }}" style="display:inline;">
        @csrf
        <input type="hidden" name="event_id" value="10">
        <label for="Event10"></label>
        <select id="Event10" name="time" required>
            <option value="">Kies een tijd</option>
            <option value="8:00">8:00</option>
            <option value="10:00">10:00</option>
            <option value="12:00">12:00</option>
            <option value="14:00">14:00</option>
            <option value="16:00">16:00</option>
            <option value="18:00">18:00</option>
            <option value="20:00">20:00</option>
        </select>
        <button type="submit" onclick="return confirm('Weet u zeker dat u wilt inschrijven voor Event Huizen?')">Inschrijven Event (Doloremque accusantium reprehenderit.)</button>
    </form>
</x-app-layout>