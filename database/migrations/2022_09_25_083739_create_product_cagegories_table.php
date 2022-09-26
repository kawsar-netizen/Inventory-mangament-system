<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCagegoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_cagegories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_category_id')->unsigned();
            $table->string('name');
            $table->string('type')->comment('1:asset,2:inventory');
            // $table->string('valuation');
            $table->timestamps();
            $table->foreign('item_category_id')->references('id')->on('item_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_cagegories');
    }
}
