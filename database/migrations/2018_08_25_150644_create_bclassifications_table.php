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
            $table->string('first');
            $table->string('second');
            $table->string('third');
            $table->string('fourth');
            $table->string('fifth');
            $table->string('sixth');
            $table->string('seventh');
            $table->string('eigth');
            $table->string('ninth');
            $table->string('tenth');
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
