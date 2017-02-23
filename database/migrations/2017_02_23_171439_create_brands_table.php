<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('slug', 60);
            $table->string('logo', 60);
            $table->text('description');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        if (Schema::hasTable('products')) {
            Schema::table('products', function ($table) {
                $table->integer('brand_id')->unsigned()->nullable()->after('slug');
            });

            Schema::table('products', function ($table) {
                $table->foreign('brand_id')->references('id')->on('brands');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        if (Schema::hasTable('products') && Schema::hasColumn('products', 'brand_id')) {

            Schema::table('products', function (Blueprint $table) {
                $table->dropForeign('products_brand_id_foreign');
                $table->dropColumn('brand_id');
            });
        }

        Schema::dropIfExists('brands');
    }
}
