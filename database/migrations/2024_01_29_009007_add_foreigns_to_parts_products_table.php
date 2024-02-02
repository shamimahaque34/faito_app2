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
        Schema::table('parts_products', function (Blueprint $table) {
            $table
                ->foreign('parts_brand_category_id')
                ->references('id')
                ->on('parts_brand_categories')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parts_products', function (Blueprint $table) {
            $table->dropForeign(['parts_brand_category_id']);
        });
    }
};
