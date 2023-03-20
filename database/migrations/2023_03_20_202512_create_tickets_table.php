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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'tickets_user_idx');
            $table->foreign('user_id', 'tickets_user_fk')->on('users')->references('id');
            $table->string('title');
            $table->unsignedBigInteger('service_order_id')->nullable();
            $table->index('service_order_id', 'tickets_service_order_idx');
            $table->foreign('service_order_id', 'tickets_service_order_fk')->on('order_services')->references('id');
            $table->unsignedBigInteger('domain_order_id')->nullable();
            $table->index('domain_order_id', 'tickets_domain_order_idx');
            $table->foreign('domain_order_id', 'tickets_domain_order_fk')->on('order_domains')->references('id');
            $table->unsignedBigInteger('hosting_order_id')->nullable();
            $table->index('hosting_order_id', 'tickets_hosting_order_idx');
            $table->foreign('hosting_order_id', 'tickets_hosting_order_fk')->on('order_hostings')->references('id');
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
        Schema::dropIfExists('tickets');
    }
};
