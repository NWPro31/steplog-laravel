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
        Schema::create('contact_ru_domains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'contact_ru_user_idx');
            $table->foreign('user_id', 'contact_ru_user_fk')->on('users')->references('id');
            $table->string('address_city');
            $table->string('address_country');
            $table->string('address_index');
            $table->string('address_oblast');
            $table->string('address_street');
            $table->string('passport_code');
            $table->string('passport_date');
            $table->string('passport_number');
            $table->string('passport_org');
            $table->string('birthday');
            $table->string('email');
            $table->string('phone');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('family_ru');
            $table->string('family_en');
            $table->string('otchestvo_ru');
            $table->string('otchestvo_en');
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
        Schema::dropIfExists('contact_ru_domains');
    }
};
