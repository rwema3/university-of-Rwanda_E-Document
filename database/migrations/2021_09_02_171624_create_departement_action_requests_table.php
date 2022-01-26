<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementActionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement_action_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('staffrequest_id');
            $table->integer('sansation');
            $table->text('comment');
            $table->date('actionDate');
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
        Schema::dropIfExists('departement_action_requests');
    }
}
