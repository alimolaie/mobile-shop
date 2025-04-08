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
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('customer_id')->default(0)->nullable();
            $table->string('file')->nullable();
            $table->string('parent_id')->default(0)->nullable();
        });
        Schema::table('stories', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('parent_id')->default(0)->nullable();
        });
        $array = [
            ['name' => 'chatStatus','value' => '1'],
            ['name' => 'ticketStatus','value' => '1'],
            ['name' => 'userSnap','value' => ''],
            ['name' => 'passwordSnap','value' => ''],
            ['name' => 'idSnap','value' => ''],
            ['name' => 'secretSnap','value' => ''],
            ['name' => 'statusSnap','value' => '0'],
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
