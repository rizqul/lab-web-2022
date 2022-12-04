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
            $table->unsignedBigInteger('permission_id')->after('seller_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
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
            $table->dropForeign('seller_permissions_permission_id_foreign');
            $table->dropColumn('permission_id');
        });
    }
};