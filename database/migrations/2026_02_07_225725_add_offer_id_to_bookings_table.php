<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'trip_id')) {
                $table->dropForeign(['trip_id']);
            }
            if (Schema::hasColumn('bookings', 'segment_id')) {
                $table->dropForeign(['segment_id']);
            }
        });

        // make them nullable (no DBAL needed)
        if (Schema::hasColumn('bookings', 'trip_id')) {
            DB::statement('ALTER TABLE bookings MODIFY trip_id BIGINT UNSIGNED NULL');
        }
        if (Schema::hasColumn('bookings', 'segment_id')) {
            DB::statement('ALTER TABLE bookings MODIFY segment_id BIGINT UNSIGNED NULL');
        }

        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'offer_id')) {
                $table->foreignId('offer_id')
                    ->nullable()
                    ->after('user_id')
                    ->constrained('offers')
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();
            }

            // re-add foreign keys if columns exist
            if (Schema::hasColumn('bookings', 'trip_id')) {
                $table->foreign('trip_id')->references('id')->on('trips')
                    ->cascadeOnUpdate()->restrictOnDelete();
            }

            if (Schema::hasColumn('bookings', 'segment_id')) {
                $table->foreign('segment_id')->references('id')->on('segments')
                    ->cascadeOnUpdate()->restrictOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (Schema::hasColumn('bookings', 'offer_id')) {
                $table->dropForeign(['offer_id']);
                $table->dropColumn('offer_id');
            }
        });
    }
};
