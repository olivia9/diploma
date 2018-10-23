<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('executor_id')->default(null);
            $table->unsignedInteger('project_id')->default(null);
            $table->unsignedInteger('status_id')->default(null);
            $table->unsignedInteger('issue_type_id');
            $table->enum('complexity',[1,2,3,4,5]);//сложность
            $table->integer('return')->default(0);
            $table->integer('estimated_time')->default(0);;
            $table->integer('spent_time')->default(0);;
            $table->enum('priority',[1,2,3,4,5]);

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('status_id')->references('id')->on('issue_statuses');
            $table->foreign('issue_type_id')->references('id')->on('issue_types');
            $table->foreign('executor_id')->references('id')->on('users');

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
        Schema::drop('issues');
    }
}
