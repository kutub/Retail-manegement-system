<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total')->nullable();
            $table->string('account_name')->nullable();
            $table->string('deposit_head')->nullable();
            $table->string('deposit_by')->nullable();
            $table->mediumText('comments')->nullable();
            $table->unsignedBigInteger('receive_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->timestamps();

            $table->foreign('receive_id')->references('id')->on('receives')
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
        Schema::dropIfExists('deposits');
    }
}
