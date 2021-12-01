<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meta_id');
            $table->foreign('meta_id')->references('id')->on('metas')->onDelete('cascade');
            $table->char('locale')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('meta_translations');
    }
}
