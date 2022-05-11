<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversions', function (Blueprint $table) {
            $table->id();
            $table->string('default_currency','5')->default('BRL');
            $table->string('default_currency_ext','50')->default('Real Brasileiro');
            $table->string('destination_currency','5');
            $table->string('value','50');
            $table->string('type_payment','20');
            $table->string('ask_value','50');
            $table->string('conversion_rate','8');
            $table->string('conversion_rate_value','50');
            $table->string('payment_rate','8');
            $table->string('payment_rate_value','50');
            $table->string('default_value','50');
            $table->string('destination_value','50');
            $table->foreignId('user_id')->unsigned()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversions');
    }
}
