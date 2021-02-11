<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photo\Index;
use App\Http\Requests\Photo\Store;
use App\Http\Resources\PhotoResource;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Http\Requests\Photo\Index $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        $photos = app('PhotoService')->index($request->validated());

        return PhotoResource::collection($photos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Photo\Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $photo = app('Photo')->create($request->validated());

        return new PhotoResource($photo);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return new PhotoResource($photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Store  $request
     * @param  App\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Store $request, Photo $photo)
    {
        $photo->update($request->validated());

        return new PhotoResource($photo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return new PhotoResource($photo);
    }
}
