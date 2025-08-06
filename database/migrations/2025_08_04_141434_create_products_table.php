<?php

use App\Models\User;
use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();

            // Clé étrangère vers categories
            $table->foreignIdFor(Category::class)
                ->constrained()
                ->onDelete('cascade');

            // Clé étrangère vers users
            $table->foreignIdFor(User::class)
                ->constrained()
                ->onDelete('cascade');

            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('quantity', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
