<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('gambar');
            $table->string('name');
            $table->integer('price');
            $table->softDeletes();
            $table->timestamps();
        });        

        DB::table('products')->insert(
            array(
                'code' => 'admin',
                'gambar' => 'https://ecs7.tokopedia.net/img/cache/700/product-1/2020/1/4/batch-upload/batch-upload_5631f9fa-8ac9-4299-a528-7edd487c6740',
                'name' => 'Kosmetik Kecantikan',
                'price' => 150000,
            )
        );         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
