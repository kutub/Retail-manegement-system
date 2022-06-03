<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->decimal('total');
            $table->decimal('tax')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('expense_head')->nullable();
            $table->string('account_head')->nullable();
            // $table->unsignedBigInteger('expense_category_id');
            $table->string('receipient_name')->nullable();
            $table->string('approved_by')->nullable();
            $table->mediumText('comments')->nullable();
            $table->timestamps();

            // $table->foreign('expense_category_id')->references('id')->on('expenses_categories')
            // ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
