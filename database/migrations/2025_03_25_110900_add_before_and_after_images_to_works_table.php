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
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('image');
            // Yangi `before_image` va `after_image` maydonlarini qo‘shish
            $table->string('before_image')->nullable()->after('title');
            $table->string('after_image')->nullable()->after('before_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn(['before_image', 'after_image']);
            // Eski `image` maydonini qayta tiklash
            $table->string('image')->nullable()->after('title');
        });
    }
};
