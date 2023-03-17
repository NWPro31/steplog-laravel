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
        Schema::create('change_domain_ns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_domain_id');
            $table->index('order_domain_id');
            $table->foreign('order_domain_id', 'change_ns_order_domain_fk')->on('order_domains')->references('id');
            $table->text('ns');
            $table->unsignedBigInteger('status_id');
            $table->index('status_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_domain_ns');
    }
};
