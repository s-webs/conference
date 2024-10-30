<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conference_id')->constrained()->onDelete('cascade');
            $table->text('preview')->nullable();
            //
            $table->string('title_ru');
            $table->string('title_kz');
            $table->string('title_en');
            //
            $table->longText('text_ru');
            $table->longText('text_kz');
            $table->longText('text_en');
            //
            $table->date('date');
            //
            $table->json('gallery')->nullable();
            $table->string('slug')->unique();
            $table->integer('views')->default(0);
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
