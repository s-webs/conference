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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->text('preview');
            $table->date('date_start');
            $table->date('date_end')->nullable(); // nullable;
            // NAME
            $table->string('name_ru');
            $table->string('name_kz');
            $table->string('name_en');
            // DESCRIPTION
            $table->longText('description_ru')->nullable();
            $table->longText('description_kz')->nullable();
            $table->longText('description_en')->nullable();
            // CONTACTS
            $table->text('contacts_ru')->nullable();
            $table->text('contacts_kz')->nullable();
            $table->text('contacts_en')->nullable();
            // FILES
            $table->longText('abstracts_file')->nullable();
            $table->longText('program_file')->nullable();
            $table->longText('info_letter')->nullable();
            //
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
