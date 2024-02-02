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
        Schema::table('motor_bike_parts_product', function (Blueprint $table) {
            $table
                ->foreign('motor_bike_id')
                ->references('id')
                ->on('motor_bikes')
                ->onDelete('CASCADE');

            $table
                ->foreign('parts_product_id')
                ->references('id')
                ->on('parts_products')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motor_bike_parts_product', function (Blueprint $table) {
            $table->dropForeign(['motor_bike_id']);
            $table->dropForeign(['parts_product_id']);
        });
    }
};
