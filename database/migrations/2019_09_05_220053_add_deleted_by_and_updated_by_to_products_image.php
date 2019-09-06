<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedByAndUpdatedByToProductsImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('product_image')) {
            Schema::table('product_image', function (Blueprint $table) {
                $table->string('deleted_by', 100)->nullable();
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
        Schema::table('product_image', function (Blueprint $table) {
            $table->dropIfExists('deleted_by');
        });
    }
}
