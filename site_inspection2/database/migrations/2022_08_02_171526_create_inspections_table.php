<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('inspections');
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->string('client_name');
            $table->string('client_representative'); 
            $table->string('site_address'); 
            $table->string('equipment'); 
            $table->string('consumablese'); 
            $table->timestamp('qoute')->nullable(); 
            $table->string('place'); 
            $table->string('Contact'); 
            $table->string('expire'); 
            $table->string('contractors'); 
            $table->float('price'); 
            $table->string('inspector'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspections');
    }
}
