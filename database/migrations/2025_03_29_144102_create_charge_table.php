<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_account')
            ->constrained('account','id')
            ->onDelete('cascade');
            $table->foreignId('id_tarid')
            ->constrained('tarid','id')
            ->onDelete('cascade');
            $table->date('c_date');
            $table->float('meter', 6, 2);
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
        Schema::dropIfExists('charge');
    }
}
