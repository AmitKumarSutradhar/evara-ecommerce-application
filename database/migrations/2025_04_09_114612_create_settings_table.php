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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('compnay_name');
            $table->text('slogun')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('support_email')->nullable();
            $table->string('office_hour')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('google_map_api_url')->nullable();
            $table->string('adnriod_app_image')->nullable();
            $table->string('adnriod_app_url')->nullable();
            $table->string('ios_app_image')->nullable();
            $table->string('ios_app_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_tranparent')->nullable();
            $table->string('payment_methods_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
