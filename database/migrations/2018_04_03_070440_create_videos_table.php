<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->comment('标题');
            $table->string('author')->comment('视频作者');
            $table->text('desc')->comment('视频描述');
            $table->integer('time_seconds')->comment('视频时长(秒)')->default(0);
            $table->string('path')->comment('视频路径');
            $table->integer('publish_time')->comment('发布时间')->default(0);
            $table->unsignedTinyInteger('is_hot')->comment('是否热点')->default(0);
            $table->unsignedTinyInteger('is_command')->comment('是否推荐')->default(0);
            $table->unsignedTinyInteger('status')->comment('状态 0:待审核;1:待发布;2:已发布;3:已删除;4:审核不通过;')->default(0);
            $table->integer('clicked')->comment('点击数')->default(0);
            $table->integer('admin_id')->comment('上传者id');
            $table->integer('tag_id')->comment('所属标签id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
