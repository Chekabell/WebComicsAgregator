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
        Schema::table("users", function (Blueprint $table) {
            $table->boolean('is_stuff')->default(false);
            $table->string('image', 150)->default('http://localhost:8000/no_avatar.jpg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema: Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('is_stuff');
        });
    }
};
