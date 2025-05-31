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


        Schema::create('mart_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_url');
            $table->timestamps();
        });


        Schema::create('marts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('mart_category_id')->constrained('mart_categories');
            $table->string('name');
            $table->text('description');
            $table->string('banner_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_url');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mart_id')->constrained('marts');
            $table->foreignId('product_category_id')->constrained('product_categories');
            $table->string('name');
            $table->text('description');
            $table->integer('stock');
            $table->decimal('price', 12, 2);
            $table->string('image_url');
            $table->timestamps();
        });

        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_url');
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('service_category_id')->constrained('service_categories');
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('image_url');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->foreignId('buyer_id')->constrained('users');
            $table->foreignId('seller_id')->constrained('users');
            $table->enum('type', ['product', 'service']);
            $table->foreignId('product_id')->nullable()->constrained('products');
            $table->foreignId('service_id')->nullable()->constrained('services');
            $table->integer('quantity')->default(1);
            $table->decimal('total_price', 12, 2);
            $table->enum('order_status', ['Pending', 'Paid', 'Complete'])->default('Pending');
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->decimal('paid_amount', 12, 2);
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::create('seller_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('bank_name');
            $table->string('account_number');
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_wallet_id')->constrained('seller_wallets');
            $table->decimal('amount', 12, 2);
            $table->timestamp('withdraw_request_date')->nullable();
            $table->timestamp('withdraw_accepted_date')->nullable();
            $table->timestamp('withdraw_rejected_date')->nullable();
            $table->text('reason')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('food_sharings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('image_url');
            $table->string('description');
            $table->string('status');
            $table->timestamp('expired_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all');
    }
};
