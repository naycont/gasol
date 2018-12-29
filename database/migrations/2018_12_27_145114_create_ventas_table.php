<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ventas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('cliente_id')->unsigned()->index();
          $table->integer('producto_id')->unsigned()->index();
          $table->string('cantidad');
          $table->float('total',10,2);
          $table->date('fecha_venta');
          $table->timestamps();
          $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
          $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
