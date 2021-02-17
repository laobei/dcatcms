<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('区块名称');
            $table->string('title')->comment('区块标题');
            $table->string('description')->nullable()->comment('区块描述');
            $table->string('thumb')->nullable()->comment('缩略图');
            $table->text('content')->comment('内容');
            $table->tinyInteger('status')->default(0)->comment('状态: 0-禁用 / 1-启用');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `blocks` comment'区块信息表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
