<?php namespace Beysong\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTicketsTable extends Migration
{

    public function up()
    {
        Schema::create('beysong_tickets', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('event_id')->unsigned()->index();
            $table->string('name')->nullable();
            $table->string('display_name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 11, 2)->default(0.00);
            $table->tinyInteger('is_activated')->default(1);
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beysong_tickets');
    }

}
