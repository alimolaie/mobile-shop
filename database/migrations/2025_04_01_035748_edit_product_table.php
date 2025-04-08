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
        Schema::table('products', function (Blueprint $table) {
            $table->text('varName3')->comment('گارانتی')->nullable();
            $table->text('varName4')->comment('ریجستر')->nullable();
            $table->boolean('register')->nullable();
            $table->text('guarantee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('varName3');
            $table->dropColumn('varName4');
            $table->dropColumn('register');
            $table->dropColumn('guarantee');
        });
    }
};
