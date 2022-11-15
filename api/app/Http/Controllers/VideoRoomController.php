<?php

namespace App\Http\Controllers;

use App\Models\VideoRoom;
use Illuminate\Http\Request;

class VideoRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoRoom::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return VideoRoom::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoRoom  $videoRoom
     * @return \Illuminate\Http\Response
     */
    public function show(VideoRoom $videoRoom)
    {
        return $videoRoom;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoRoom  $videoRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoRoom $videoRoom)
    {
        return $videoRoom->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoRoom  $videoRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoRoom $videoRoom)
    {
        $videoRoom->delete();
        return ['msg' => 'Video room deleted'];
    }
}
