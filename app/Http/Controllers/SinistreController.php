<?php

namespace App\Http\Controllers;

use App\Models\AdhUser;
use App\Models\Sinistre;
use Illuminate\Http\Request;

class SinistreController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
    {
         dd($request->all());
        $validated = $request->validate([
            'date_soin' => 'required|date',
        ]);

        Sinistre::create([
            'date_soin' => $validated['date_soin'],
        ]);

        return redirect()->back()->with('success', 'Date de soin enregistrée avec succès !');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
