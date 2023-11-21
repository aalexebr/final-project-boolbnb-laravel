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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('object', 64)->nullable();
            $table->date('date');
            $table->text('content');
            $table->string('email', 512);
            $table->timestamps();

            $table->unsignedBigInteger('apartment_id')->nullable();

            $table->foreign('apartment_id')
                ->references('id')
                ->on('apartments')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
