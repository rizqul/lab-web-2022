<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        // Table products
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('seller_id')
                ->after('name')
                ->constrained('sellers')
                ->onDelete('cascade');

            $table->foreignId('category_id')
                ->after('seller_id')
                ->constrained('categories')
                ->onDelete('cascade');
        });

        // Table seller_permissions
        Schema::table('seller_permissions', function (Blueprint $table) {
            $table->foreignId('seller_id')
                ->after('id')
                ->constrained('sellers')
                ->onDelete('cascade');

            $table->foreignId('permission_id')
                ->after('seller_id')
                ->constrained('permissions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        // Table Products
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_seller_id_foreign');
            $table->dropColumn('seller_id');

            $table->dropForeign('products_category_id_foreign');
            $table->dropColumn('category_id');
        });

        // Table seller_permissions
        Schema::table('seller_permissions', function (Blueprint $table) {
            $table->dropForeign('seller_permissions_seller_id_foreign');
            $table->dropColumn('seller_id');

            $table->dropForeign('seller_permissions_permission_id_foreign');
            $table->dropColumn('permission_id');
        });
    }
};
