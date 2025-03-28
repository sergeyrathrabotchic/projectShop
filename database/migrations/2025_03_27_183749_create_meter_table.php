<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_group')
            ->constrained('meter_group','id')
            ->onDelete('cascade');
            $table->date('m_date');
            $table->float('amount', 6, 2);
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
        Schema::dropIfExists('meter');
    }
}
