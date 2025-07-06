<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// 1. create a new migration file.
// 2. tricky, rename existing migration file and delete table from db
// 3. rollback

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // column = id , primary key
            $table->timestamps(); // created_at, updated_at, type=date
            $table->string('name');
            $table->string('description');
            $table->string('url');
            $table->string('price');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
