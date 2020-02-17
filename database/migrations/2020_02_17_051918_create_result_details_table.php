<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('result_id');
            $table->float('diem_a', 6, 2);
            $table->float('diem_b', 6, 2);
            $table->float('diem_c', 6, 2);
            $table->float('diem_d', 6, 2);
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
        Schema::dropIfExists('result_details');
    }
}