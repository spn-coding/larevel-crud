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
        Schema::create('drugstores', function (Blueprint $table) {
            $table->id();
            $table->string('drug_name');
            $table->string('unit');
            $table->string('quantity');
            $table->string('price');
            $table->tinyInteger("del_flag")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugstores');
    }
};
