<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReklamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reklames', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->longText('judul');
            $table->json('ukuran');
            $table->enum('tipe',['portrait','landscape']);
            $table->enum('arah',['utara','timur laut','timur','tenggara','selatan','barat daya','barat','barat laut']);
            $table->enum('kategori',['indoor','outdoor']);
            $table->json('foto');
            $table->json('alamat');
            $table->longText('content');
            $table->string('slug');
            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('reklames');
    }
}
