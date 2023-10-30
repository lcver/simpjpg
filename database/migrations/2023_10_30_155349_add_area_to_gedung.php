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
        Schema::table('gedung', function (Blueprint $table) {
            $table->string('area_id', 10)->required()->after('gedung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gedung', function (Blueprint $table) {
            $table->dropColumn('area_id');
        });
    }
};
