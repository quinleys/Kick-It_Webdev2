<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('packages', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
                $table->String('title');
                $table->longText('description');
                $table->integer('min_value')->default(0);
                $table->integer('max_value')->nullable();
                $table->bigInteger('project_id')->unsigned()->nullable();
                $table->foreign('project_id')->references('id')->on('projects');
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
