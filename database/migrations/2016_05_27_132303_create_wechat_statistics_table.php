<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page', '18');
            $table->uuid('artwork_md5');
            $table->string('type', '18'); // ['share-timeline', 'share-appmessage', 'share-qq', 'share-weibo']
            $table->string('ip');
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
        Schema::drop('wechat_statistics');
    }
}
