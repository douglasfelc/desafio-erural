<?php

namespace App\Http\Controllers;

use App\Models\VideoRoomItem;
use Illuminate\Http\Request;

class VideoRoomItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoRoomItem::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return VideoRoomItem::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoRoomItem  $videoRoomItem
     * @return \Illuminate\Http\Response
     */
    public function show(VideoRoomItem $videoRoomItem)
    {
        return $videoRoomItem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoRoomItem  $videoRoomItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoRoomItem $videoRoomItem)
    {
        return $videoRoomItem->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoRoomItem  $videoRoomItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoRoomItem $videoRoomItem)
    {
        $videoRoomItem->delete();
        return ['msg' => 'Video room item deleted'];
    }
}
