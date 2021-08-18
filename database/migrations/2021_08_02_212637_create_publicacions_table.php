<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();

            $table->string("nombre");
            $table->string("ficha");

            $table->text("extracto")->nullable();
            $table->longText("cuerpo")->nullable();

            $table->enum("estados",[1,2])->default(1);

            $table->unsignedBigInteger("id_usuario");
            $table->unsignedBigInteger("id_categoria");

            $table->foreign("id_usuario")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("id_categoria")->references("id")->on("categorias")->onDelete("cascade");
            
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
        Schema::dropIfExists('publicacions');
    }
}
