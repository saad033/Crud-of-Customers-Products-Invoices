<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->foreignId('product_id');
            $table->text('address');
            $table->text('phone_number');
            $table->string('short_description');
            $table->unsignedInteger('qty')->nullable();
            $table->decimal('sale_price')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('tax')->nullable();
            $table->decimal('after_vat')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
