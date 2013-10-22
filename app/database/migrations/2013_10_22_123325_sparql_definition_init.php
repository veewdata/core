<?php

use Illuminate\Database\Migrations\Migration;

class SparqlDefinitionInit extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the table for the SPARQLDefinition model.
        Schema::create('sparqldefinitions', function($table){

            $table->increments('id');
            $table->string('endpoint', 256);
            $table->string('query', '1024');
            $table->string('endpoint_user', 256);
            $table->string('endpoint_password', 256);
            $table->string('documentation');

            // created_at | updated_at DATETIME, are default expected by the Eloquent ORM.
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
        // Drop the table for the SPARQLDefinition model.
        Schema::drop('sparqldefinitions');
    }
}