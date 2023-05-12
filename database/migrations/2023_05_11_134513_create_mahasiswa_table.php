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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("studi");
            $table->string("fakultas");
            $table->date("ttl");
            $table->string("jenis_kelamin");
            $table->string("email");
            $table->string("password");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
//     nim
// nama lengkap
// program studi
// fakultas 
// ttl 
// jenis kelamin
// email 
// create at
// password
};
