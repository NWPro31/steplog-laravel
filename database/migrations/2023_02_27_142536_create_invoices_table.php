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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('amount')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->index('status_id', 'invoices_status_idx');
            $table->boolean('is_paid')->default(0);
            $table->index('user_id', 'invoices_user_idx');
            $table->foreign('user_id', 'invoices_user_fk')->on('users')->references('id');
            $table->unsignedBigInteger('service_order_id')->nullable();
            $table->index('service_order_id', 'invoices_service_order_idx');
            $table->foreign('service_order_id', 'invoices_service_order_fk')->on('order_services')->references('id');
            $table->unsignedBigInteger('domain_order_id')->nullable();
            $table->index('domain_order_id', 'invoices_domain_order_idx');
            $table->unsignedBigInteger('hosting_order_id')->nullable();
            $table->index('hosting_order_id', 'invoices_hosting_order_idx');
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
        Schema::dropIfExists('invoices');
    }
};
