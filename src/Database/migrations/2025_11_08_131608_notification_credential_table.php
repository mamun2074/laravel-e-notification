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
        Schema::create('e_notification_credentials', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('1=mail, 2=sms, 3=web, 4=web notificatoin');
            $table->string('title', 50)->comment('Name of the credentials. e.g: Codex, Verimo etc.');
            $table->string('host', 255)->comment('Host IP or URL should be set here');
            $table->unsignedInteger('port')->nullable()->comment('Port of the host or URL');
            $table->string('username', 255)->default('0')->comment('Username/api_key/app_key may be set here');
            $table->string('password', 255)->default('0')->comment('Password/secret_key may be placed here');
            $table->string('api_key', 255)->default('0');
            $table->string('encryption_type', 255)->nullable()->comment('Email encryption type e.g. tls, ssl, starttls etc');
            $table->string('transport_driver', 255)->nullable()->comment('SMTP, Mailgun, etc.');
            $table->string('from_address', 255)->nullable()->comment('Email/phone/url may be placed here');
            $table->string('from_name', 50)->nullable()->comment('Title of from address.');
            $table->tinyInteger('status')->default(0)->comment('0=inactive, 1=active');
            $table->unsignedInteger('created_by_id')->default(0);
            $table->unsignedInteger('updated_by_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_notification_credentials');
    }
};
