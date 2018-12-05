<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_texts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('content')->default('')->comment('文本回复内容');
//          外键约束  规则表
            $table->unsignedInteger('rule_id')->index()->default(0)->comment('规则主键id');
            $table->foreign('rule_id')
                ->references('id')->on('rules')
                ->onDelete('cascade');
            $table->timestamps();
        },'基本文本回复');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('response_texts');
    }
}
