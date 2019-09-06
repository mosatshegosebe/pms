<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyOnProductsImageLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_image_location', function (Blueprint $table) {
            if (Schema::hasColumn('product_image_location', 'product_id')) {
                $table->index('product_id');
                $table->foreign('product_id')->references('id')->on('products');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_image_location', function (Blueprint $table) {
            if (DB::getDriverName() !== 'sqlite') {
                $table->dropForeign('product_image_location_product_id_foreign');
                $table->dropIndex('product_image_location_product_id_index');
            }
        });
    }
}
