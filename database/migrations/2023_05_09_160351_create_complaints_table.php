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
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date_of_absence_collection');
            $table->string('adress', 150);
            $table->string('status', 20)->nullable();
            $table->string('contact_number', 20);
            $table->string('fraction', 25);
            $table->text('note')->nullable();
            $table->date('date_of_collection')->nullable();
            $table->string('truck_number')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
