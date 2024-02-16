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
        Schema::create('users', function (Blueprint $table) {
            $table->id();//integer con incremento
            $table->string('name',20); //varchar con largo de 20 caracteres
            $table->text('fullname'); //text, como en postgre
            $table->string('email')->unique(); //este es unique, basicamente que es unico, no se puede repetir
            $table->timestamp('email_verified_at')->nullable(); //este es un timestamp, la propiedad nullable es para decir que este campo puede estar vacío
            $table->string('password');//string de columna llamada password
            $table->string('avatar');//columna creada para probar migration:fresh
            $table->rememberToken();//cada vez que el usuario marque la opcion de "mantener la sesion iniciada" se puede crear esta columna, es un varchar de 
            //100 de largo, que se encarga de crear un token de inicio de sesion
            $table->timestamps();//este comando crea 2 columnas llamadas "created_at" y "updated_at", los cuales se utilizan para migraciones
            //la primera guarda la fecha y hora de un registro, y la 2da es para guardar cuando se actualizó un registro.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
