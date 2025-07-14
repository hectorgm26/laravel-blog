<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {

            // Se agrega solo los nuevos campos que se quieren agregar a la tabla, no es necesario volver a definir los campos ya existentes. ESTE CAMPO SE AGREGARA AL FINAL DE LA TABLA 'posts'.

            // Agrega una nueva columna 'body' de tipo texto a la tabla 'posts'.
            $table->text('body')->after('title');
            
            // ESTE CAMPO SE AGREGARA AL FINAL DE LA TABLA 'posts', SALVO que se especifique lo contrario con el método after() o before(), y dentro el nombre de la columna antes o después de la cual se quiere agregar la nueva columna.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Se pone lo contrario, es decir, eliminar la columna 'body' de la tabla 'posts'.
            $table->dropColumn('body');
        });
    }
};
