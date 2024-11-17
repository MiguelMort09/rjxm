<?php

namespace App\Http\Controllers;

use App\Http\Resources\CallResource;
use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->input('limit')) {
            return CallResource::collection(Call::query()->limit(3)->orderBy('id', 'desc')->get());
            //return Inertia::getShared('Posts', PostResource::collection(Call::query()->limit(5)->get()));
        }
        return CallResource::collection(Call::all());
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
    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Call $call)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Call $call)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Call $call)
    {
        //
    }
}
