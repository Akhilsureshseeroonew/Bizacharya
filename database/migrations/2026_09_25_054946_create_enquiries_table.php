<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('city')->nullable();
            $table->string('interest')->nullable();
            $table->json('service')->nullable();
            $table->string('source_url')->nullable();
            $table->string('page_context')->nullable();
            $table->enum('status', ['new', 'contacted', 'closed'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
