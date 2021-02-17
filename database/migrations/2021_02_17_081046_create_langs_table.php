<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('语言名称');
            $table->string('lang')->comment('语言标识');
            $table->tinyInteger('status')->default(0)->comment('状态: 0-禁用 / 1-启用');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `langs` comment'语言表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('langs');
    }
}
