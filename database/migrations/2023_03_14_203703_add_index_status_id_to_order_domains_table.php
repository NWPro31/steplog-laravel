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
        Schema::table('order_domains', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->after('domain_id')->nullable();
            $table->index('status_id', 'status_order_domain_idx');
            $table->foreign('status_id', 'status_order_domain_fk')->on('status_order_domains')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_domains', function (Blueprint $table) {
            $table->dropForeign('status_order_domain_fk');
            $table->dropColumn('status_id');
        });
    }
};
