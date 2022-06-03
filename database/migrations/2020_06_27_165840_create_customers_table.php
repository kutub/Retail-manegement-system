<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('mobile', 15)-> nullable();
            $table->string('email')->nullable();
            $table->string('status', 50)->nullable();
            $table->mediumText('address_1')->nullable();
            $table->mediumText('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->mediumText('comments')->nullable();
            $table->double('balance')->nullable();
            $table->float('credit_limit')->nullable();
            $table->boolean('disable_loyalty')->default(false);
            $table->float('amount_for_next_point')->nullable();
            $table->float('points')->nullable();
            $table->string('company_name')->nullable();
            $table->string('account')->nullable();
            $table->boolean('override_tax')->default(false);
            $table->boolean('taxable')->default(true);
            $table->string('non_tax_certificate_no')->nullable();
            $table->string('bkash_number')->nullable();
            $table->string('test')->nullable();
            $table->double('percentage')->nullable();
            $table->string('tier_name')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
