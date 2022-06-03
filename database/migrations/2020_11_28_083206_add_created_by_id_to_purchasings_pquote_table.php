<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByIdToPurchasingsPquoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
            Schema::table('purchasings', function (Blueprint $table) {
                $table->unsignedBigInteger('created_by_user_id')->nullable();
                $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
    
            Schema::table('purchasing_pquote', function (Blueprint $table) {
                $table->unsignedBigInteger('created_by_user_id')->nullable();
                $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasings_pquote', function (Blueprint $table) {
            //
        });
    }
}
