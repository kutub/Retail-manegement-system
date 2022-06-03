<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('receive_id')->nullable();
            $table->unsignedBigInteger('expense_id')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('debited')->nullable();
            $table->decimal('credited')->nullable();
            $table->decimal('balance')->nullable();
            $table->string('account_head')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->mediumText('comments')->nullable();
            $table->timestamps();

            $table->foreign('receive_id')->references('id')->on('receives')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('expense_id')->references('id')->on('expenses')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('bank_id')->references('id')->on('banks')
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
        Schema::dropIfExists('cashes');
    }
}
