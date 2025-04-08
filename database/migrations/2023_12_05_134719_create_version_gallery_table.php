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
        Schema::table('products', function (Blueprint $table) {
            $table->string('skima')->nullable();
            $table->string('robots')->nullable();
            $table->string('rating')->nullable();
            $table->string('meta')->nullable();
        });
        $array = [
            ['name' => 'deliverStatus','value' => '0'],
            ['name' => 'sellerStatus','value' => '0'],
            ['name' => 'floatDesign','value' => '0'],
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
