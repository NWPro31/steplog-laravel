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
        Schema::create('order_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->index('service_id', 'order_services_service_idx');
            $table->foreign('service_id', 'order_services_service_fk')->on('services')->references('id');
            $table->index('user_id', 'order_services_user_idx');
            $table->foreign('user_id', 'order_services_user_fk')->on('users')->references('id');
            $table->text('description')->nullable();
            $table->text('access')->nullable();
            $table->unsignedInteger('price');
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
        Schema::dropIfExists('order_services');
    }
};
