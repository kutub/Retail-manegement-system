<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('items_id')->default(1);
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('supplier_id')->default(1);
            $table->double('cost_price')->default(0);
            $table->decimal('quantity')->nullable();
            $table->decimal('trasport')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('payments')->nullable();
            $table->decimal('due')->nullable();
            $table->text('notes')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('items_id')->references('id')->on('items')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')
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
        Schema::dropIfExists('purchasings');
    }
}
