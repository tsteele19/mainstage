<?php

namespace App\Http\Controllers;

use App\Models\Promoter;
use Illuminate\Http\Request;

class PromoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get existing promoters
        $promoters = Promoter::where('is_player_controlled', false)->get();

        // Return
        return view('promoters.create', compact('promoters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:promoters,name',
            ],
            'bio' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'mode' => [
                'required',
                'in:easy,normal,hard,very_hard',
            ],
        ]);

        /**
         * Difficulty:
         * For now, difficulty is determined by 'mode' field.
         * This determines starting cash and rep/exp values.
         * This will likely expand later.
         */
        // Set starting_values
        $starting_values = match ($validated['mode']) {
            'easy' => [
                'cash' => 25000000.00,
                'reputation' => 90,
                'experience' => 80,
            ],
            'normal' => [
                'cash' => 5000000,
                'reputation' => 60,
                'experience' => 45,
            ],
            'hard' => [
                'cash' => 750000,
                'reputation' => 25,
                'experience' => 15,
            ],
            'very_hard' => [
                'cash' => 100000,
                'reputation' => 5,
                'experience' => 0,
            ],
        };

        // Clear any user controlled promoters
        Promoter::where('is_player_controlled', true)->update([
            'is_player_controlled' => false,
        ]);

        // Create entry in promoters table
        Promoter::create([
            'name' => $validated['name'],
            'bio' => $validated['bio'] ?? null,
            'type' => 'indie',
            'starting_cash' => $starting_values['cash'],
            'current_cash' => $starting_values['cash'],
            'reputation' => $starting_values['reputation'],
            'experience' => $starting_values['experience'],
            'is_player_controlled' => true,
            'founded_at' => now(),
            'status' => 'active',
        ]);

        // Return
        return redirect()->route('dashboard')->with('success', 'Promoter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promoter $promoter)
    {
        // Return
        return view('promoters.show', compact('promoter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promoter $promoter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promoter $promoter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promoter $promoter)
    {
        //
    }

    /**
     * Select existing promoter
     */
    public function select(Request $request)
    {
        // Validate data
        $validated = $request->validate([
            'promoter_id' => [
                'required',
                'exists:promoters,id',
            ],
        ]);

        // Clear current active promoter
        Promoter::where('is_player_controlled', true)->update([
            'is_player_controlled' => false,
        ]);

        // Set selected promoter as active
        Promoter::where('id', $validated['promoter_id'])->update([
            'is_player_controlled' => true,
        ]);

        // Return
        return redirect()
            ->route('dashboard')
            ->with('success', 'Promoter selected successfully.');
    }
}
