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
        Schema::table('market_verdor_parts_product', function (
            Blueprint $table
        ) {
            $table
                ->foreign('market_verdor_id')
                ->references('id')
                ->on('market_verdors')
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
        Schema::table('market_verdor_parts_product', function (
            Blueprint $table
        ) {
            $table->dropForeign(['market_verdor_id']);
            $table->dropForeign(['parts_product_id']);
        });
    }
};
