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
        Schema::create('order_domains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'order_domains_user_idx');
            $table->foreign('user_id', 'order_domains_user_fk')->on('users')->references('id');
            $table->unsignedBigInteger('domain_id');
            $table->index('domain_id', 'order_domains_domain_idx');
            $table->foreign('domain_id', 'order_domains_domain_fk')->on('domains')->references('id');
            $table->unsignedBigInteger('contact_ru_id');
            $table->index('contact_ru_id', 'order_domains_contact_ru_idx');
            $table->foreign('contact_ru_id', 'order_domains_contact_ru_fk')->on('contact_ru_domains')->references('id');
            $table->unsignedBigInteger('url');
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
        Schema::dropIfExists('order_domains');
    }
};
