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
        Schema::create('latest_news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable(); // Make description nullable if not always provided
            $table->date('event_date')->nullable(); // Add event date column
            $table->string('image')->nullable(); // Add image column (path to image)
            $table->string('location')->nullable(); // Add location column
            $table->boolean('published')->default(false); // Add published column with default false
            $table->string('organizer')->nullable(); // Add organizer column
            $table->integer('expected_attendees')->nullable(); // Add expected attendees column
            $table->text('attendees')->nullable(); // Add attendees list column
            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_news');
    }
};
