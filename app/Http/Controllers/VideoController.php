<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page = ($request->has("per_page")) ? $request->per_page : 5;

        $query = Video::query();

        foreach ($request->all() as $key => $value) {
            if ($key == "sort") {
                foreach ($request->sort as $key => $value) {
                    $query->orderBy($key, $value);
                }
            } else {
                $query->where($key, $value);
            }
        }

        return $query->paginate($per_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\VideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $video = Video::create($request->validated());
        return response()->json($video, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $videoModel = Video::find($video);
        if ($videoModel === null) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        return $videoModel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\VideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, Video $video)
    {
        $video->fill($request->validated());
        $video->save();

        return $video;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if ($video->delete()) {
            return response()->json("Video deletado com sucesso", 200);
        }

        return response()->json("Erro ao tentar deletar video", 500);
    }
}
