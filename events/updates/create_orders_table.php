<?php namespace Beysong\Events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('beysong_orders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('event_id')->unsigned()->index();
            $table->integer('discount_id');
            //订单总金额,订单总额
            $table->decimal('total_amount', 11, 2)->default(0.00);
            //应付总金额,除去折扣后的金额
            $table->decimal('real_amount', 11, 2)->default(0.00);
            //折扣减免金额
			$table->decimal('discount_amount', 11, 2)->default(0.00);
            //已付金额
       		$table->decimal('paid_amount', 11, 2)->default(0.00);
			//支付流水号
            $table->string('trade_no', 100)->nullable();
            //支付方式
            $table->string('pay_code', 32)->nullable();
            //订单状态 0默认未完成,1订单完成,2订单删除
            $table->tinyInteger('status')->default(0);
            //支付状态 0未付,1已付,2已退
            $table->tinyInteger('pay_status')->default(0);
            //签到凭证
            $table->string('badge_code', 128)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beysong_orders');
    }

}
