<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropBrgyInhabitantsTable extends Migration
{
    public function up()
    {
        // Drop the table if it exists
        Schema::dropIfExists('brgy_inhabitants');
    }

    public function down()
    {
        // You can recreate the table in the down method if needed
        Schema::create('brgy_inhabitants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->integer('age');
            $table->date('birthdate');
            $table->string('placeofbirth');
            $table->enum('sex', ['male', 'female']);
            $table->string('civilstatus');
            $table->string('positioninFamily')->nullable();
            $table->string('citizenship');
            $table->string('educAttainment')->nullable();
            $table->string('occupation')->nullable();
            $table->boolean('ofw')->default(false);
            $table->boolean('pwd')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            // Foreign key constraint (if you want to restore it later)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
