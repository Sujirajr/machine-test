<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestLogsTable extends Migration
{
    public function up()
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->text('url');
            $table->string('ip_address');
            $table->integer('status_code');
            $table->float('response_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_logs');
    }
}
