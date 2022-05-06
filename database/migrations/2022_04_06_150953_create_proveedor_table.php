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
            $table->unsignedBigInteger('user_id')->unique();
            $table->char('ruc', 11);
            $table->string('razon_social');
            $table->unsignedBigInteger('rubro_proveedor_id');
            $table->text('descripcion')->nullable();
            $table->string('url_img_proveedor')->default('https://img.freepik.com/vector-gratis/infografia-perfil-cliente_52683-9740.jpg?w=826&t=st=1651794919~exp=1651795519~hmac=5ad183e034dd0b0065807c7f1d790176c0cdb730c7ce301ad6dfc92bb202efae');
            $table->boolean('estado')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
