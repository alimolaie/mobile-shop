<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nameSeo');
            $table->string('slug');
            $table->string('image',400)->nullable();
            $table->text('body')->nullable();
            $table->text('bodySeo')->nullable();
            $table->string('keyword',400)->nullable();
            $table->timestamps();
        });
        Schema::create('brandables', function (Blueprint $table) {
            $table->integer('brand_id');
            $table->integer('brandables_id');
            $table->string('brandables_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
