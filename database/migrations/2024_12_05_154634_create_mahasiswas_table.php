<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('mahasiswas', function (Blueprint $table) {
        $table->id();
        $table->string('nim', 20);
        $table->string('nama_lengkap', 100);
        $table->string('jurusan', 50);
        $table->string('tempat_lahir', 50);
        $table->date('tanggal_lahir');
        $table->string('no_hp', 15);
        $table->string('email', 100);
        $table->text('alamat_tinggal');
        $table->string('foto', 255)->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
