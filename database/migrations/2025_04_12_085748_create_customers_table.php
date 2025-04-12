<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id'); // Primary key with AUTO_INCREMENT
            $table->text('customer_name')->unique()->nullable();
            $table->text('customer_email')->nullable();
            $table->text('customer_password')->nullable();
            $table->text('login_otp')->nullable();
            $table->timestamp('expire_at')->nullable();
            $table->timestamps(); // This adds created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
