<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	 	  
    public function up()
    {
		Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('clientes', function (Blueprint $table) {
            
			$table->string('rfc',13)->nullable()->change();
			$table->string('direccion')->nullable()->change();
			$table->string('telefono')->nullable()->change();
			
			$table->text('nota')->nullable()->change();
			$table->string('email')->nullable()->after('telefono');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
}
