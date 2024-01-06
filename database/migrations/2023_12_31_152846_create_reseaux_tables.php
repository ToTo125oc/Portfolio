<?php

use App\Models\Competence;
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
        Schema::create('reseaux', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("urlReseau");
            $table->string('imageReseau');
            $table->foreignIdFor(Competence::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseaux');
    }
};
