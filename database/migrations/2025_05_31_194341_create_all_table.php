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

          Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_url');
            $table->timestamps();
        });

         Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon_url');
            $table->timestamps();
        });


        Schema::create('marts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('mart_category_id')->nullable()->constrained('mart_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('banner_url')->nullable();
            $table->boolean('is_active')->default(false);
            $table->integer('review_count')->default(0);
            $table->integer('total_rating')->default(0);
            $table->decimal('average_rating', 6, 2)->default(0);
            $table->timestamps();
        });



        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mart_id')->constrained('marts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_category_id')->constrained('product_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->text('description');
            $table->integer('stock');
            $table->decimal('price', 12, 2);
            $table->string('image_url');
            $table->integer('review_count')->default(0);
            $table->integer('total_rating')->default(0);
            $table->decimal('average_rating', 6, 2)->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });



        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('mart_id')->nullable()->constrained('marts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('service_category_id')->constrained('service_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('image_url');
            $table->boolean('is_available')->default(true);
            $table->integer('review_count')->default(0);
            $table->integer('total_rating')->default(0);
            $table->decimal('average_rating', 6, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->unique(['user_id', 'product_id'], 'unique_user_product_cart');
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('transaction_code')->unique();
            // $table->foreignId('group_order_id')->constrained('group_orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->decimal('paid_amount', 12, 2);
            $table->json('gateway_response')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });

        Schema::create('group_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('mart_id')->constrained('marts')->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_cost', 12,2)->nullable();

            $table->decimal('sub_total', 12,2);
            $table->decimal('total_price', 12,2);

            $table->enum('order_status', ['Pending', 'Shipped', 'Paid', 'Completed', 'Cancelled', 'On-Proses'])->default('Pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('on_processed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique(); // nanti hapus
            $table->foreignId('group_order_id')->constrained('group_orders')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('buyer_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate(); // hapus nanti
            $table->foreignId('seller_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate(); // hapus nanti

            $table->foreignId('mart_id')->constrained('marts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['Product', 'Service']);
            $table->foreignId('product_id')->nullable()->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('service_id')->nullable()->constrained('services')->cascadeOnDelete()->cascadeOnUpdate();

            $table->integer('quantity')->nullable();
            $table->decimal('total_price', 12, 2);
            $table->text('note')->nullable();

            $table->timestamp('paid_at')->nullable(); // hapus nanti
            $table->timestamp('on_processed_at')->nullable(); // hapus nanti
            $table->timestamp('cancelled_at')->nullable(); // hapus nanti
            $table->timestamp('completed_at')->nullable(); // hapus nanti

            //Snap
            $table->string('product_name'); // nama product/service saat order
            $table->decimal('product_price', 12, 2); // harga saat order

            $table->enum('order_status', ['Pending', 'Paid', 'Completed', 'Cancelled', 'On-Proses'])->nullable()->default('Pending'); // hapus nanti
            $table->timestamps();
        });



        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::create('seller_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->decimal('amount', 12, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_wallet_id')->constrained('seller_wallets')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('amount', 12, 2);
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->timestamp('withdraw_accepted_date')->nullable();
            $table->timestamp('withdraw_rejected_date')->nullable();
            $table->text('reason')->nullable();
            $table->enum('status', ['Pending', 'Accepted', 'Rejected'])->default('Pending');
            $table->timestamps();
        });

        Schema::create('food_sharings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('image_url')->nullable();
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
