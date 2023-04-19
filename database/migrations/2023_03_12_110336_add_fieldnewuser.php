<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldnewuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        
        $table->char('nik', 18)->nullable();
        $table->string('first_name', 50)->nullable();
        $table->string('last_name', 100)->nullable();
        $table->string('no_handphone', 14)->nullable();
        $table->enum('jenkel',['laki-laki','perempuan'])->nullable();
        $table->text('alamat')->nullable();
        $table->char('rt', 10)->nullable();
        $table->char('rw', 10)->nullable();
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
