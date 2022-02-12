<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospect_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('prospect_id');
            $table->string('communication_type')->nullable();
            $table->string('type')->nullable();
            $table->text('notes')->nullable();
            $table->text('metadata')->nullable();
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
        Schema::dropIfExists('prospect_activities');
    }
}
