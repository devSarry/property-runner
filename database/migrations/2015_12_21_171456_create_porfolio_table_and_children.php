<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorfolioTableAndChildren extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->softDeletes();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->integer('country_id')->unsigned();
            $table->string('work_phone')->nullable();
            $table->text('description')->nullable();
            $table->string('owner')->nullable();
            $table->integer('portfolio_id')->unsigned()->nullable();
            $table->boolean('active')->default(false);
            $table->softDeletes();

            $table->foreign('country_id')
                ->references('id')
                ->on('countries');

            $table->foreign('portfolio_id')
                ->references('id')
                ->on('portfolios')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('address')->nullable();
            $table->integer('sq_ft');
            $table->text('description')->nullable();
            $table->unsignedInteger('building_id');
            $table->softDeletes();

            $table->foreign('building_id')
                ->references('id')
                ->on('buildings')
                ->onDelete('cascade');

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
        Schema::drop('units');
        Schema::drop('buildings');
        Schema::drop('portfolios');
    }
}
