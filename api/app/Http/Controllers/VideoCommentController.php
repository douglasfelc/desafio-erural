<?php

namespace App\Http\Controllers;

use App\Models\VideoComment;
use Illuminate\Http\Request;

class VideoCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoComment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return VideoComment::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoComment  $videoComment
     * @return \Illuminate\Http\Response
     */
    public function show(VideoComment $videoComment)
    {
        return $videoComment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoComment  $videoComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoComment $videoComment)
    {
        return $videoComment->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoComment  $videoComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoComment $videoComment)
    {
        $videoComment->delete();
        return ['msg' => 'Video comment deleted'];
    }
}
