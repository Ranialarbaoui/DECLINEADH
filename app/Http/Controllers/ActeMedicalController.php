<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActeMedical;

class ActeMedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function showDashbord()
{
    return view('dashbord'); // juste la page avec boutons
}
public function getActesByType($type)
{
    // ORM Eloquent -> récupérer les actes d’un type donné
    $actes = ActeMedical::where('type', $type)->get();

    return response()->json($actes);
}
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
        //
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
