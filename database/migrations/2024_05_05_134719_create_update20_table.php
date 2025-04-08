<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->text('options')->nullable();
        });
        Schema::table('collections', function (Blueprint $table) {
            $table->text('options')->nullable();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->string('varName1')->default('رنگ')->nullable();
            $table->string('varName2')->default('سایز')->nullable();
        });
        $array = [
            ['name' => 'scoreDay','value' => '10'],
        ];
        foreach ($array as $item) {
            DB::table('settings')->insert(
                array(
                    'key' => $item['name'],
                    'value' => $item['value'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                )
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_setting');
    }
};
