<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('file_name')->unique()->comment('文件名');
            $table->string('lang')->default('cn')->comment('语言');
            $table->string('seo_title')->nullable()->comment('SEO标题');
            $table->string('keywords')->nullable()->comment('关键词');
            $table->string('description')->nullable()->comment('描述');
            $table->text('content')->nullable()->comment('内容');
            $table->string('target')->default('_blank')->comment('打开方式: _blank/_self');
            $table->string('thumb')->nullable()->comment('缩略图');
            $table->integer('author')->comment('作者');
            $table->tinyInteger('is_top')->default(0)->comment('是否推荐: 0-否/1-是');
            $table->tinyInteger('status')->default(1)->comment('状态: 0-禁用 / 1-启用');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `news` comment'信息表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
