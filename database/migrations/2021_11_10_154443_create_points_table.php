<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('is_delete',20)->default("active");
            $table->biginteger('members_id')->unsigned()->index();
            $table->unsignedInteger("sale");
            $table->unsignedInteger("pay_cash");
            $table->unsignedInteger("pay_point");
            $table->unsignedInteger("get_point");
            $table->unsignedInteger("total_point");
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
        Schema::dropIfExists('points');
    }
}
