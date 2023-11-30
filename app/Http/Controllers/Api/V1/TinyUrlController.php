<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\StoreTinyUrlRequest;
use App\Http\Requests\V1\UpdateTinyUrlRequest;
use App\Models\TinyUrl;

class TinyUrlController extends Controller
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
    public function store(StoreTinyUrlRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TinyUrl $tinyUrl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TinyUrl $tinyUrl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTinyUrlRequest $request, TinyUrl $tinyUrl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinyUrl $tinyUrl)
    {
        //
    }
}
