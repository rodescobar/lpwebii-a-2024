<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    { 
        Schema::create('categoria', function (Blueprint $table) {
            $table->id(); //Inteiro AutoIncremento PK => id
            $table->string("cat_nome");
            $table->string("cat_descricao")->nullable();
            $table->boolean("cat_ativo")->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria');
    }
};
