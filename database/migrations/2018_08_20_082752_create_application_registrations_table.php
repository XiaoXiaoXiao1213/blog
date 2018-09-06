<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coo_name',45)->comment('公司名称');
            $table->string('coo_address',60)->comment('公司地址');
            $table->string('user_name',12)->comment('联系人姓名');
            $table->string('user_phone')->comment('联系人电话号码');
            $table->string('Co_categories')->comment('商品类别');
            $table->string('Co_profile',400)->comment('商品简介');
            $table->string('Co_file',60)->comment('文件路径');
            $table->string('Bu_content',60)->comment('经营内容');
            $table->string('Bu_nature',60)->comment('经营性质');
            $table->string('Ca_composition',60)->comment('资金构成');
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
        Schema::dropIfExists('application_registrations');
    }
}
