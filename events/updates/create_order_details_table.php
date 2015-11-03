<?php namespace Beysong\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateOrderDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('beysong_order_details', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('order_id')->unsigned()->index();
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('email');
            $table->string('mobile', 32)->nullable();
            $table->string('telphone', 32)->nullable();
            $table->string('company', 100);
            $table->string('title', 100);
            $table->string('country', 32)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('zip', 32)->nullable();
            $table->string('photo', 128)->nullable();
            
            //ticket id 用逗号','分割
            $table->string('tickets', 100);
            //订单总额
            $table->decimal('amount', 11, 2)->default(0.00);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beysong_order_details');
    }

}
