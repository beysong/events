<?php namespace Beysong\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEventsTable extends Migration
{

    public function up()
    {
        Schema::create('beysong_evnets', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('display_name')->nullable();
            $table->text('description')->nullable();
            $table->text('permissions')->nullable();
            $table->boolean('is_activated')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beysong_events');
    }

}
