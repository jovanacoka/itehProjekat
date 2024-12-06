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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Povezivanje sa korisnikom
            $table->foreignId('item_category_id')->constrained()->onDelete('cascade'); // Povezivanje sa kategorijom odeće
            $table->foreignId('weather_category_id')->constrained()->onDelete('cascade'); // Povezivanje sa vremenskom kategorijom
        
            $table->string('color'); // Boja odeće
            $table->string('size'); // Veličina odeće
            $table->string('image_url')->nullable(); // Slika komada odeće
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
