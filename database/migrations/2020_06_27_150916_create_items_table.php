<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('generic')->nullable();
            $table->unsignedBigInteger('category_id')->default(1);
            $table->unsignedBigInteger('supplier_id')->default(1);
            $table->string('upc_ean_isbn')->nullable();
            $table->string('product_id')->nullable();
            $table->string('additional_item_no')->nullable();
            $table->mediumText('tags')->nullable();
            $table->string('manufacturer')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_service')->default(true);
            $table->boolean('allow_alt_description')->default(false);
            $table->boolean('item_has_serial_number')->default(false);
            $table->boolean('disable_loyalty')->default(false);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('brand')->nullable();
            $table->string('year')->nullable();
            $table->string('parts_no')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->mediumText('attribute')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('attribute_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id')->default(1);
            $table->unsignedBigInteger('items_id')->default(1);
            $table->timestamps();

            $table->foreign('items_id')->references('id')->on('items')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('pricings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('items_id');
            $table->double('cost_price')->default(0);
            $table->double('selling_price')->default(0);
            $table->double('promo_price')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->boolean('include_tax')->default(false);
            $table->boolean('change_price')->default(false);
            $table->boolean('override_commission')->default(false);
            $table->boolean('override_tax')->default(false);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('items_id')->references('id')->on('items')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('items_id');
            $table->string('reorder_level')->nullable();
            $table->string('replenish_level')->nullable();
            $table->string('expiration_date')->nullable();
            $table->decimal('quantity')->nullable();
            $table->string('inventory_add_subs')->nullable();
            $table->text('comments')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('items_id')->references('id')->on('items')
            ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable()->default('none');
            $table->unsignedBigInteger('items_id');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('items_id')->references('id')->on('items')
            ->onUpdate('cascade')->onDelete('cascade');
        });
        
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('at_store')->nullable();
            $table->string('reorder_level')->nullable();
            $table->string('replenish_level')->nullable();
            $table->unsignedBigInteger('items_id');
            $table->boolean('override_prices')->default(false);
            $table->boolean('override_tax')->default(false);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            
            $table->foreign('items_id')->references('id')->on('items')
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
        Schema::dropIfExists('items');
    }
}
