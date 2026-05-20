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
        Schema::table('equipos', function (Blueprint $table) {
            $table->foreignId('tecnico_id')->nullable()->constrained('tecnicos')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            $table->dropForeign(['tecnico_id']);
            $table->dropColumn('tecnico_id');
        });
    }
};
