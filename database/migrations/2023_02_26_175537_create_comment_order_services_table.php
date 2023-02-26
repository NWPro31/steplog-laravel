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
        Schema::create('comment_order_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->index('order_id', 'comment_order_services_service_idx');
            $table->foreign('order_id', 'comment_order_services_service_fk')->on('order_services')->references('id');
            $table->index('user_id', 'comment_order_services_user_idx');
            $table->foreign('user_id', 'comment_order_services_user_fk')->on('users')->references('id');
            $table->text('comment');
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
        Schema::dropIfExists('comment_order_services');
    }
};
