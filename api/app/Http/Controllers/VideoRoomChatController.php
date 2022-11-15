<?php

namespace App\Http\Controllers;

use App\Models\VideoRoomChat;
use Illuminate\Http\Request;

class VideoRoomChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoRoomChat::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return VideoRoomChat::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoRoomChat  $videoRoomChat
     * @return \Illuminate\Http\Response
     */
    public function show(VideoRoomChat $videoRoomChat)
    {
        return $videoRoomChat;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoRoomChat  $videoRoomChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoRoomChat $videoRoomChat)
    {
        return $videoRoomChat->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoRoomChat  $videoRoomChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoRoomChat $videoRoomChat)
    {
        $videoRoomChat->delete();
        return ['msg' => 'Message of video room chat deleted'];
    }
}
