<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->text('product_details');
            $table->string('product_thumbnail');
            $table->integer('product_quantity');
            $table->string('product_visiblity');
            $table->double('product_price',8, 2);
            $table->integer('discount');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('id');
            $table->integer('product_avg_rating');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE products ADD FULLTEXT fulltext_index (product_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
