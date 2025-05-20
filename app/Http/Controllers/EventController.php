<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        // Fetch all events from the database
        $events = Event::all();

        // Return the view with the events data
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        // Fetch the event by ID
        $event = Event::findOrFail($id);

        // Return the view with the event data
        return view('events.show', compact('event'));
    }

    public function create()
    {
        // Return the view to create a new event
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Create a new event
        Event::create($request->all());

        // Redirect to the show page of the newly created event with a success message
        return redirect()->route('events.show', Event::latest()->first()->id)
            ->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        // Fetch the event by ID
        $event = Event::findOrFail($id);

        // Return the view to edit the event
        return view('events.edit', compact('event'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        // Fetch the event by ID
        $event = Event::findOrFail($id);

        // Update the event
        $event->update($request->all());

        // Redirect to the show page of the updated event with a success message
        return redirect()->route('events.show', $event->id)->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        // Fetch the event by ID
        $event = Event::findOrFail($id);

        // Delete the event
        $event->delete();

        // Redirect to the events index with a success message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
