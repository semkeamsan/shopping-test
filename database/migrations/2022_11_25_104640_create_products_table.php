<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('tax_class_id');
            $table->string('slug')->unique();
            $table->decimal('price');
            $table->decimal('special_price')->nullable();
            $table->char('special_price_type')->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->decimal('selling_price');
            $table->string('sku')->nullable();
            $table->boolean('manage_stock');
            $table->integer('qty');
            $table->boolean('in_stock');
            $table->boolean('is_active');
            $table->boolean('virtual')->default(0);
            $table->text('feature')->nullable();
            $table->json('images')->nullable();
            $table->json('downloads')->nullable();
            $table->date('new_from')->nullable();
            $table->date('new_to')->nullable();
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
        Schema::dropIfExists('products');
    }
}
