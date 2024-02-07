<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\GetUniqueTinyUrl;
use App\Http\Requests\V1\StoreTinyUrlRequest;
use App\Http\Requests\V1\UpdateTinyUrlRequest;
use App\Http\Resources\V1\TinyUrlCollection;
use App\Http\Resources\V1\TinyUrlResource;
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
     * Store a newly created resource in storage.
     */
    public function store(StoreTinyUrlRequest $request, GetUniqueTinyUrl $getUniqueTinyUrl)
    {
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        if (!is_null($validated['custom_url'])) {
            $validated['tiny_url'] = $validated['custom_url'];
        } else {
            $validated['tiny_url'] = $getUniqueTinyUrl->handle();
        }

        return $this->success(new TinyUrlResource(TinyUrl::create($validated)));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinyUrl $tinyUrl)
    {
        //
    }
}
