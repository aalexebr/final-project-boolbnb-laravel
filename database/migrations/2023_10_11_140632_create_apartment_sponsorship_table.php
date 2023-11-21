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
        Schema::create('apartment_sponsorship', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('start_date');
            $table->dateTimeTz('end_date');
            $table->timestamps(0);


            $table->unsignedBigInteger('sponsorship_id')->nullable();

            $table->foreign('sponsorship_id')
                ->references('id')
                ->on('sponsorships')
                ->onUpdate('cascade')
                ->onDelete('cascade');



            $table->unsignedBigInteger('apartment_id')->nullable();

            $table->foreign('apartment_id')
                ->references('id')
                ->on('apartments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartment_sponsorship');
    }
};
