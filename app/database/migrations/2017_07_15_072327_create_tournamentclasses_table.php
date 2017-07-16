<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournamentclasses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('type')->comment('Group, Group + Finals');
            $table->unsignedInteger('match_length')->comment('Minutes between start of a match and next match. This includes playing time, half time break and time for next match to start.');
            $table->unsignedInteger('group_size')->comment('Ideal number of teams in each group.');
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
        Schema::dropIfExists('tournamentclasses');
    }
}
