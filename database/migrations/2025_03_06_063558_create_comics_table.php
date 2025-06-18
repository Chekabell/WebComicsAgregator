<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('title', 150);
            $table->text('description')->nullable();
            $table->year('year');
            $table->float('avg_rating',1)->unsigned()->default(0.0);
            $table->integer('quantity_rates')->unsigned()->default(0);
            $table->bigInteger('summ_rates')->unsigned()->default(0);
            $table->string('type_comics');
            $table->string('image',200);
            $table->string('link',200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
