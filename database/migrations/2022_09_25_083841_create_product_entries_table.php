<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_category_id')->unsigned();
            $table->bigInteger('product_category_id')->unsigned();
            $table->bigInteger('branch_id')->unsigned();
            $table->string('name');
            $table->string('type')->comment('1:asset,2:inventory');
            $table->string('status')->comment('0:requisition,1:product_entry');
            $table->string('brand_no')->nullable();
            $table->string('model_no')->nullable();
            $table->string('quantity')->nullable();
            $table->string('purchased_name')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('warranty_date')->nullable();
            $table->string('tag_no');
            $table->string('entry_by');
            $table->timestamps();
            $table->foreign('item_category_id')->references('id')->on('item_categories')->onDelete('cascade');
            $table->foreign('product_category_id')->references('id')->on('product_cagegories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_entries');
    }
}
