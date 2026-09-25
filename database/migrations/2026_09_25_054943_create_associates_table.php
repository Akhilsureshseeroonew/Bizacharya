<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('associates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('district');
            $table->string('occupation');
            $table->string('organization')->nullable();
            $table->text('why')->nullable();
            $table->enum('status', ['new', 'contacted', 'approved', 'rejected'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('associates');
    }
};
