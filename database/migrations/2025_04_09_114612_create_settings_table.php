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
            $table->text('facebook_url')->nullable();
            $table->text('x_url')->nullable();
            $table->text('linkedin_url')->nullable();
            $table->text('youtube_url')->nullable();
            $table->text('instagram_url')->nullable();
            $table->text('google_map_api_url')->nullable();
            $table->text('adnriod_app_image')->nullable();
            $table->text('adnriod_app_url')->nullable();
            $table->text('ios_app_image')->nullable();
            $table->text('ios_app_url')->nullable();
            $table->text('company_address')->nullable();
            $table->text('logo')->nullable();
            $table->text('logo_tranparent')->nullable();
            $table->text('favicon')->nullable();
            $table->text('site_title')->nullable();
            $table->text('payment_methods_image')->nullable();
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
