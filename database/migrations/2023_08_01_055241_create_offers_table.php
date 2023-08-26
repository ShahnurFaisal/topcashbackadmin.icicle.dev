<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_title');
            $table->longText('offer_description');
            $table->string('affiliate_link');
            $table->double('offer_amount');
            $table->string('offer_percentage');
            $table->string('QR_code')->nullable();
            $table->text('offer_image');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('subCategory_id');
            $table->foreign('subCategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('qr_code_id')->nullable();
            $table->foreign('qr_code_id')->references('id')->on('qrcodes')->onDelete('cascade');
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id')->references('id')->on('merchants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
