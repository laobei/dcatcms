<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('description')->comment('描述');
            $table->string('pic_url')->comment('图片地址');
            $table->string('title_color')->default('#111111')->comment('标题颜色');
            $table->string('description_color')->default('#e5e5e5')->comment('描述颜色');
            $table->string('link_url')->nullable()->comment('链接地址');
            $table->string('position')->default('home')->comment('显示位置');
            $table->tinyInteger('status')->default(0)->comment('状态: 0-禁用 / 1-启用');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `banners` comment'Banner数据表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
