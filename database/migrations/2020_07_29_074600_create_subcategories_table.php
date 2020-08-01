<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id'); // cid လို့ရေးရင် relationship ပြန်ချိတ်ပေးရ
            $table->timestamps();
            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade'); // relationship ချိတ်ဆက်ပုံ 


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}
