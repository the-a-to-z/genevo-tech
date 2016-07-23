<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateJobListingItemCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_widget_job_listing_item_categories', function (Blueprint $table) {
            $table->integer('item_id');
            $table->integer('category_id');

            $table->primary(['item_id', 'category_id'], 'job_listing_item_id_category_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('module_widget_job_listing_item_categories');
    }

}
