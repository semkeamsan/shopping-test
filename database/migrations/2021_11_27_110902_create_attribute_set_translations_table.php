<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeSetTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_set_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_set_id');
            $table->foreign('attribute_set_id')->references('id')->on('attribute_sets')->onDelete('cascade');
            $table->char('locale');
            $table->string('name');
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
        Schema::dropIfExists('attribute_set_translations');
    }
}
