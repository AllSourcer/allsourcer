<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('filter_id')->unsigned()->index();
            //$table->string('type');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('duration')->default(3);
            $table->enum('work_location',['Remote','Onsite','Onsite Or Remote'])->default('Remote');
            $table->enum('status',['Pending','Inprogress','Completed','Expired'])->default('Pending');
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
        Schema::drop('tasks');
    }
}
