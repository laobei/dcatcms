<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(0)->comment('上级栏目ID');
            $table->string('name')->comment('名称');
            $table->string('module')->comment('模块: article/news/products/case/page');
            $table->string('file_name')->unique()->comment('文件名');
            $table->string('lang')->default('cn')->comment('语言');
            $table->string('seo_title')->nullable()->comment('seo标题');
            $table->string('keywords')->nullable()->comment('关键词');
            $table->string('description')->nullable()->comment('描述');
            $table->text('content')->nullable()->comment('内容');
            $table->string('target')->default('_blank')->comment('打开方式: _blank/_self');
            $table->string('link_url')->nullable()->comment('外部链接地址');
            $table->string('banner')->nullable()->comment('栏目banner图');
            $table->string('icon')->nullable()->comment('栏目ICON');
            $table->tinyInteger('is_show')->default(1)->comment('显示到栏目: 0-不显示，１－显示');
            $table->tinyInteger('status')->default(1)->comment('状态: ０－禁用，　１－启用');
            $table->tinyInteger('nofollow')->default(0)->comment('搜索引擎追踪: 0-否 / 1-是');
            $table->tinyInteger('module_type')->default(0)->comment('栏目模式: 0-频道/1-列表/2-单页/3-外部链接');
            $table->tinyInteger('next_nav')->default(0)->comment('是否显示下一栏目内容');
            $table->integer('sort')->default(100)->comment('排序');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `categories` comment'栏目表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
