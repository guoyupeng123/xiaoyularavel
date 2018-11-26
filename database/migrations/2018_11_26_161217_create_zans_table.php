<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zans', function (Blueprint $table) {
            $table->increments('id');
//            Eloquent: 关联->多态关联
            $table->unsignedInteger('user_id')->index()->default(0)->comment('用户id');
            $table->unsignedInteger('zan_id')->index()->default(0)->comment('文章id/评论id');
            $table->string('zan_type')->index()->default('')->comment('赞类型');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zans');
    }
}
