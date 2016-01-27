<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsAndInvoiceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries', function($t)
        {
            $t->increments('id');
            $t->string('name');
        });

        Schema::create('lease_types', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('name');
            $table->text('description');

            $table->timestamps();
        });

        Schema::create('leases', function (Blueprint $table)
        {
            $table->increments('id');

            $table->softDeletes();

            $table->integer('type_id')->unsigned();
            $table->text('terms');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('amount');
            $table->string('pdf_link');

            $table->foreign('type_id')
                ->references('id')
                ->on('lease_types');

            $table->timestamps();
        });

        Schema::create('sizes', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('tenants', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('unit_id')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->string('name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('work_phone')->nullable();
            $table->text('private_notes')->nullable();
            $table->decimal('balance', 13, 2)->nullable();
            $table->decimal('paid_to_date', 13, 2)->nullable();
            $table->string('website')->nullable();
            $table->unsignedInteger('industry_id')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            $table->unsignedInteger('lease_id')->nullable();

            $table->foreign('lease_id')
                ->references('id')
                ->on('leases');

            $table->foreign('size_id')
                ->references('id')
                ->on('sizes');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries');

            $table->foreign('industry_id')
                ->references('id')
                ->on('industries');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units');

        });

        Schema::create('invoices', function (Blueprint $table)
        {
            $table->increments('id');
            $table->softDeletes();

            $table->string('name');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('tenant_id')->index();
            $table->unsignedInteger('invoice_status_id')->default(1);
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->text('terms');

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
        Schema::drop('tenants');
        Schema::drop('invoices');
        Schema::drop('leases');
        Schema::drop('lease_types');
        Schema::drop('sizes');
        Schema::drop('industries');
    }
}
