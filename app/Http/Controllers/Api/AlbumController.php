<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\Index;
use App\Http\Requests\Album\Store;
use App\Http\Resources\AlbumResource;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Http\Requests\Album\Index $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        $albums = app('AlbumService')->index($request->validated());

        return AlbumResource::collection($albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Album\Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $album = app('Album')->create($request->validated());

        return new AlbumResource($album);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Album\Store  $request
     * @param  App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request, Album $album)
    {
        $album->update($request->validated());

        return new AlbumResource($album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return new AlbumResource($album);
    }
}
