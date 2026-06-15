<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Promoter;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve events
        $events = Event::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('type', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%")
                        ->orWhere('bio', 'like', "%{$search}%");
                });
            })
            ->orderBy('starts_at')
            ->get();

        // Return
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return view
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'bio' => [
                'nullable',
                'string',
            ],

            'starts_at' => [
                'required',
                'date',
            ],

            'duration' => [
                'required',
                'integer',
                'min:1',
            ]
        ]);

        // Get promoter
        $promoter = Promoter::where('is_player_controlled', true)->firstOrFail();

        // Add event to DB
        $event = Event::create([
            'name' => $validated['name'],
            'type' => 'festival', // Potentially getting nuked as this progresses.
            'bio' => $validated['bio'] ?? null,
            'starts_at' => $validated['starts_at'],
            'duration' => $validated['duration'],
            'promoter_id' => $promoter->id,
            'status' => 'planning',
            'is_active' => true,
            'is_recurring' => false,
        ]);

        // Return and redirect
        return redirect()
            ->route('events.show', $event)
            ->with('success', 'Festival created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // Return view
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Return view
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // Validate form
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'bio' => [
                'nullable',
                'string',
            ],

            'starts_at' => [
                'required',
                'date',
            ],

            'duration' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        // Update event
        $event->update([
            'name' => $validated['name'],
            'bio' => $validated['bio'] ?? null,
            'starts_at' => $validated['starts_at'],
            'duration' => $validated['duration'],
        ]);

        // Return and redirect
        return redirect()
            ->route('events.show', $event)
            ->with('success', 'Festival updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Delete event
        $event->delete();

        // Return and redirect
        return redirect()
            ->route('events.index')
            ->with('success', 'Festival deleted successfully.');
    }
}
