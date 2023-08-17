<?php

namespace App\Http\Controllers;

use App\Models\Openedfincash;
use Illuminate\Http\Request;
class OpenedfincashController extends Controller
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
        $hasUnfinishedFincash = OpenedFincash::where('openfincash_isFinished', false)->exists();
        $unfinishedFincash = OpenedFincash::where('openfincash_isFinished', false)->first();

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

        // Create a new Openedfincash instance
        $openedfincash = new Openedfincash();
        $openedfincash->openfincash_name = $validatedData['name'];
        $openedfincash->openfincash_value = $validatedData['value'];
        $openedfincash->openfincash_isFinished = false;

        // Save the opened financial cash to the database
        $openedfincash->save();

        return redirect(route('fincash.create'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Openedfincash $openedfincash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Openedfincash $openedfincash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Openedfincash $openedfincash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Openedfincash $openedfincash)
    {
        //
    }
}
