<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\GetUniqueTinyUrl;
use App\Http\Requests\V1\StoreTinyUrlRequest;
use App\Http\Resources\V1\TinyUrlCollection;
use App\Http\Resources\V1\TinyUrlResource;
use App\Models\TinyUrl;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class TinyUrlController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->success(new TinyUrlCollection(TinyUrl::where('user_id', auth()->id())->latest()->get()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTinyUrlRequest $request, GetUniqueTinyUrl $getUniqueTinyUrl): JsonResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        $validated['tiny_url'] = $validated['custom_url'] ?? $getUniqueTinyUrl->execute();

        return $this->success(new TinyUrlResource(TinyUrl::create($validated)));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinyUrl $tinyUrl): JsonResponse
    {
        if ($tinyUrl->user_id !== auth()->id()) {
            return $this->error(null, 403, 'You\'re not authenticated to perform this action.');
        }

        $tinyUrl->delete();

        return $this->success(new TinyUrlResource($tinyUrl), 200, 'The URL has been deleted successfully.');
    }

    public function redirect(TinyUrl $tinyUrl): RedirectResponse
    {
        return redirect()->to($tinyUrl->full_url);
    }
}
