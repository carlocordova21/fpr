<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id();
            $table->char('ruc', 11);
            $table->string('razon_social');
            $table->unsignedBigInteger('rubro_proveedor_id');
            $table->text('descripcion');
            $table->boolean('estado');
            $table->timestamps();

            $table->foreign('rubro_proveedor_id')->references('id')->on('rubro_proveedor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor');
    }
}
