<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string("subscription_name", 100);
            $table->string("description");
            $table->tinyInteger("screenshot_preserve_duration")->unsigned();
            $table->smallInteger("number_of_employee")->unsigned();
            $table->boolean("finance_module")->unsigned();
            $table->boolean("accounting_module")->unsigned();
            $table->boolean("network_platform")->unsigned();
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
        Schema::dropIfExists('subscriptions');
    }
}
