<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\StoreTinyUrlRequest;
use App\Http\Requests\V1\UpdateTinyUrlRequest;
use App\Http\Resources\V1\TinyUrlCollection;
use App\Models\TinyUrl;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;

class TinyUrlController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success(new TinyUrlCollection(TinyUrl::where('user_id', auth()->id())->paginate()));
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
