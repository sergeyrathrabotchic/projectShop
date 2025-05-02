<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsGBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
            ->constrained('categories','id')
            ->onDelete('cascade');
            $table->string('title', 255);
            $table->string('author', 191)->default('Admin');
            $table->enum('status',['PUBLISHED', 'DRAFT', 'BLOCKED'])
                ->default('PUBLISHED');
            $table->string('image', 191)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
