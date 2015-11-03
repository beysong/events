<?php namespace Beysong\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('beysong_discounts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('event_id')->unsigned()->index();
            $table->string('code',128);
            $table->decimal('value',11,2)->default(0.00);
            //状态 0未使用，1已使用
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beysong_discounts');
    }

}
