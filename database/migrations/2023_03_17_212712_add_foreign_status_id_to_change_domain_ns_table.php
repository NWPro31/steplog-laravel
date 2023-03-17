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
        Schema::table('change_domain_ns', function (Blueprint $table) {
            $table->foreign('status_id', 'status_change_domain_ns_fk')->on('status_change_domain_ns')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('change_domain_ns', function (Blueprint $table) {
            $table->dropForeign('status_change_domain_ns_fk');
        });
    }
};
