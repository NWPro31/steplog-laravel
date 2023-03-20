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
        Schema::create('message_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'message_tickets_user_idx');
            $table->foreign('user_id', 'message_tickets_user_fk')->on('users')->references('id');
            $table->text('message');
            $table->unsignedBigInteger('ticket_id');
            $table->index('ticket_id', 'message_ticket_idx');
            $table->foreign('ticket_id', 'message_ticket_fk')->on('tickets')->references('id');
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
        Schema::dropIfExists('message_tickets');
    }
};
