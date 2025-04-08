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
        $array = [
            ['name' => 'preLoaderStatus','value' => '1'],
            ['name' => 'newRedirect','value' => '0'],
            ['name' => 'redirectStatus','value' => ''],
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
