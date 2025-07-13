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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('discount_percent');
            $table->float('rating');
            $table->string('thumbnail');
            $table->string('level', 50);
            $table->string('tags');
            $table->string('tutors');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            /**
             *
             * Supporting methods for learning:
             * - nullable(): Allows a column to accept NULL values.
             * - unique(): Adds a unique index to the column.
             * - default($value): Sets a default value for the column.
             * - index(): Adds an index to the column.
             * - onDelete('cascade'): Deletes related records on parent deletion.
             */
            // 
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
