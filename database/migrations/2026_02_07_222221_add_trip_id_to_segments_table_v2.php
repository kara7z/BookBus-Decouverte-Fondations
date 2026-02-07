<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('segments', 'trip_id')) {
            Schema::table('segments', function (Blueprint $table) {
                $table->foreignId('trip_id')
                    ->nullable()
                    ->after('route_id')
                    ->constrained('trips')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('segments', 'trip_id')) {
            Schema::table('segments', function (Blueprint $table) {
                $table->dropForeign(['trip_id']);
                $table->dropColumn('trip_id');
            });
        }
    }
};
