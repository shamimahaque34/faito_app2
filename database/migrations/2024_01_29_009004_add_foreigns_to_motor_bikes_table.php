<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('motor_bikes', function (Blueprint $table) {
            $table
                ->foreign('bike_brand_id')
                ->references('id')
                ->on('bike_brands')
                ->onDelete('CASCADE');

            $table
                ->foreign('bike_motor_type_id')
                ->references('id')
                ->on('bike_motor_types')
                ->onDelete('CASCADE');

            $table
                ->foreign('bike_engine_size_id')
                ->references('id')
                ->on('bike_engine_sizes')
                ->onDelete('CASCADE');

            $table
                ->foreign('bike_year_version_id')
                ->references('id')
                ->on('bike_year_versions')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motor_bikes', function (Blueprint $table) {
            $table->dropForeign(['bike_brand_id']);
            $table->dropForeign(['bike_motor_type_id']);
            $table->dropForeign(['bike_engine_size_id']);
            $table->dropForeign(['bike_year_version_id']);
        });
    }
};
