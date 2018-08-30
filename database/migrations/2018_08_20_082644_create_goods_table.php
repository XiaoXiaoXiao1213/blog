<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Go_name',40)->comment('商品名称');
            $table->string('brand',30)->comment('品牌');
            $table->string('characteristic',200)->comment('特点');
            $table->string('specifications',200)->comment('规格');
            $table->string('mclassi',30)->comment('中分类');
            $table->integer('bclassi')->comment('大分类');
            $table->string('sclassi',30)->comment('小分类');
            $table->string('pic1');
            $table->string('pic2');
            $table->string('pic3');
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
        Schema::dropIfExists('goods');
    }
}
