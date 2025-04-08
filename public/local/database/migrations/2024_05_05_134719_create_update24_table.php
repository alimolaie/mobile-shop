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
        Schema::table('ticket', function (Blueprint $table) {
            $table->string('property',50)->nullable();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->string('user_name',100)->nullable();
        });
        $array = [
            ['name' => 'messageTicketManager','value' => ''],
            ['name' => 'messageTicket','value' => ''],
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
