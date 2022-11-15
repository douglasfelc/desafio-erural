<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoRoomItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_room_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_room_id');
            $table->unsignedBigInteger('video_id');
            $table->timestamps();

            //foreign key (constraints)
            $table->foreign('video_room_id')->references('id')->on('video_rooms');
            $table->foreign('video_id')->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_room_items');
    }
}
