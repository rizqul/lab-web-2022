<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permission_sellers', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id')->after('id');
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permission_sellers', function (Blueprint $table) {
            $table->dropForeign('seller_permissions_seller_id_foreign');
            $table->dropColumn('seller_id');
        });
    }
};