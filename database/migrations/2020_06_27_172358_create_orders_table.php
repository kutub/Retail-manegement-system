<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('sub_total')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('due')->nullable();
            $table->string('payment_type')->nullable();
            $table->double('vat')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('payment_total')->nullable();
            $table->mediumText('comments')->nullable();
            $table->boolean('show_comment')->default(false);
            $table->boolean('change_date')->default(false);
            $table->boolean('include_transport')->default(false);
            $table->string('modified_date')->nullable();
            $table->decimal('transport_cost')->nullable();
            $table->decimal('total_profit')->nullable();
            $table->string('created_by')->nullable();
            $table->double('discount')->default(0);
            $table->mediumText('discount_reason')->nullable();
            $table->string('status')->default('success');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
