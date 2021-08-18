<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtiquetasPublicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquetas_publicacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("publicacion_id");
            $table->unsignedBigInteger("etiquetas_id");
            $table->foreign("publicacion_id")->references("id")->on("publicacions")->onDelete("cascade");
            $table->foreign("etiquetas_id")->references("id")->on("etiquetas")->onDelete("cascade");
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
        Schema::dropIfExists('etiquetas_publicacion');
    }
}
