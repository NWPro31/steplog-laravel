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
        Schema::create('order_hostings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'order_hostings_user_idx');
            $table->foreign('user_id', 'order_hostings_user_fk')->on('users')->references('id');
            $table->unsignedBigInteger('hosting_id');
            $table->index('hosting_id', 'order_hostings_hosting_idx');
            $table->foreign('hosting_id', 'order_hostings_hosting_fk')->on('hostings')->references('id');
            $table->unsignedBigInteger('status_id');
            $table->index('status_id', 'order_hostings_status_idx');
            $table->foreign('status_id', 'order_hostings_status_fk')->on('status_order_hostings')->references('id');
            $table->string('name');
            $table->string('url');
            $table->unsignedBigInteger('price');
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
        Schema::dropIfExists('order_hostings');
    }
};
