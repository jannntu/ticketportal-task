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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nazov');
            $table->string('hladisko');
            $table->string('adresa')->nullable();
            $table->date('zaciatok');
            $table->integer('pocet_radov')->nullable()->default('5');
            $table->integer('pocet_sedadiel')->nullable()->default('10');
            $table->string('cena');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
