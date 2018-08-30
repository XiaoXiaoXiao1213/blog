<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBclassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bclassifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstb')->comment('容器');
            $table->string('secondb')->comment('计量器');
            $table->string('thirdb')->comment('实验用品');
            $table->string('fourthb')->comment('通用仪器');
            $table->string('fifthb')->comment('理化前');
            $table->string('sixthb')->comment('理化分析');
            $table->string('seventhb')->comment('环境检测');
            $table->string('eigthb')->comment('工业微生物');
            $table->string('ninthb')->comment('临床诊断');
            $table->string('tenthb')->comment('个人防护');
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
        Schema::dropIfExists('bclassifications');
    }
}
