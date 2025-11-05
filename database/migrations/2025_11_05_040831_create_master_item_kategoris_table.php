<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_item_kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kategori')->nullable();
            $table->foreign('kode_kategori')->references('kode')->on('kategoris')->onDelete('cascade');
            $table->foreignId('id_master_item')->constrained('master_items')->onDelete('cascade');
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
        Schema::dropIfExists('master_item_kategoris');
    }
};
