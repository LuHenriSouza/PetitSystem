<?php

namespace App\Http\Controllers;

use App\Models\Fincash;
use Illuminate\Http\Request;

class FincashController extends Controller
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
        $hasUnfinishedFincash = Fincash::where('fincash_isFinished', false)->exists();
        $unfinishedFincash = Fincash::where('fincash_isFinished', false)->first();

        return view('sb-admin.fincash',  compact('hasUnfinishedFincash','unfinishedFincash'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'value' => 'required|numeric',
        ]);

        // Create a new fincash instance
        $fincash = new Fincash();
        $fincash->fincash_name = $validatedData['name'];
        $fincash->fincash_value = $validatedData['value'];

        // Save the  financial cash to the database
        $fincash->save();

        return redirect(route('fincash.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Fincash $fincash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fincash $fincash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fincash $fincash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fincash $fincash)
    {
        //
    }
}
