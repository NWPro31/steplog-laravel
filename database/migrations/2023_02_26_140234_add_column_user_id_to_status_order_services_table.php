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
        Schema::table('status_order_services', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('order_id');
            $table->index('user_id', 'status_order_services_user_idx');
            $table->foreign('user_id', 'status_order_services_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status_order_services', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
        });
    }
};
