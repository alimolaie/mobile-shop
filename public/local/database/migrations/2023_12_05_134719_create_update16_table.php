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
        Schema::table('carriers', function (Blueprint $table) {
            $table->bigInteger('weight')->default(9999999999)->nullable();
            $table->bigInteger('weightPrice')->default(0)->nullable();
        });
        $array = [
            ['name' => 'backIndex','value' => ''],
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
