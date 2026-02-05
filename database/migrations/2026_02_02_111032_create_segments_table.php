<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('segments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('route_id')
                ->constrained('routes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            
            $table->foreignId('from_stop_id')
                ->constrained('stops')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('to_stop_id')
                ->constrained('stops')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('distance', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('segments');
    }
};
