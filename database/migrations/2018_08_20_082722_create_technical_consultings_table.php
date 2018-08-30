<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnicalConsultingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_consultings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Coo_name',60)->comment('公司名称');
            $table->string('Coo_address',120)->comment('公司地址');
            $table->string('user_name',12)->comment('用户名称');
            $table->bigInteger('user_phone')->comment('联系人电话');
            $table->string('email')->comment('联系人邮箱');
            $table->string('Goods_name',30)->comment('商品名称');
            $table->string('contect',600)->comment('咨询内容');
            $table->string('email2')->comment('指定邮箱');
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
        Schema::dropIfExists('technical_consultings');
    }
}
