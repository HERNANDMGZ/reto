<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->string('name');
            $table->string('status');
            $table->string('total_price');
            $table->string('address_payment');
            $table->string('reference')->unique();
            $table->dateTime('expiration');
            $table->string('request_id')->nullable();
            $table->string('process_url')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');

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
}
