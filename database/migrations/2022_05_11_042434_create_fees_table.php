<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->double('conversion_rate_under', '7', '3')->default('0.02');
            $table->double('conversion_rate_above', '7', '3')->default('0.01');
            $table->double('payment_rate_ticket', '7', '4')->default('0.0145');
            $table->double('payment_rate_credit_card', '7', '4')->default('0.0763');
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
        Schema::dropIfExists('fees');
    }
}
