<?php

use App\Http\Controllers\Admin\MartController as AdminMartController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\WithdrawController as AdminWithdrawController;
use App\Http\Controllers\Customer\CartController as CustomerCartController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Customer\MartRegistrationController as CustomerMartRegistrationController;
use App\Http\Controllers\Customer\MessageController as CustomerMessageController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\ProfileController as CustomerProfileController;
use App\Http\Controllers\Customer\ReviewController as CustomerReviewController;
use App\Http\Controllers\Customer\ServiceController as CustomerServiceController;
use App\Http\Controllers\Customer\TransactionController as CustomerTransactionController;
use App\Http\Controllers\Customer\JobApplicantController as CustomerJobApplicantController;
use App\Http\Controllers\Seller\MartController as SellerMartController;
use App\Http\Controllers\Seller\ProductController as SellerProductController;
use App\Http\Controllers\Seller\ProfileController as SellerProfileController;
use App\Http\Controllers\Seller\ServiceController as SellerServiceController;
use App\Http\Controllers\Seller\TransactionController as SellerTransactionController;
use App\Http\Controllers\Seller\WalletController as SellerWalletController;
use App\Http\Controllers\Seller\WithdrawController as SellerWithdrawController;
use App\Http\Controllers\Employer\JobVacancyController as EmployerJobVacancyController;
use App\Http\Controllers\Employer\JobApplicantController as EmployerJobApplicantController;
use App\Livewire\IndexChat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    if (Auth::user()->role == 'Seller' || Auth::user()->role == 'Buyer') {
        return redirect()->route('customer.home.index');
    } elseif (Auth::user()->is_admin == true) {
        return redirect()->route('admin.user.index');
    } else {
        abort(403, 'Unauthorized');
    }
})->middleware('auth');

Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::resource('mart', AdminMartController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('product', AdminProductController::class);
    Route::resource('service', AdminServiceController::class);
    Route::resource('transaction', AdminTransactionController::class);
    Route::resource('withdraw', AdminWithdrawController::class);


    Route::get('registration/mart', [AdminMartController::class, 'registration'])->name('mart.registration');
    Route::put('accept/registration/mart/{mart}', [AdminMartController::class, 'acceptMartRegistration'])->name('mart.registrationAccept');
    Route::put('reject/registration/mart/{mart}', [AdminMartController::class, 'rejectMartRegistration'])->name('mart.registrationReject');
});



Route::middleware('auth')->prefix('seller')->as('seller.')->group(function () {
    Route::resource('profile', SellerProfileController::class)->except('update');
    Route::get('profile/setting', [SellerProfileController::class, 'show'])->name('profile.show');
    Route::put('profile/update', [SellerProfileController::class, 'update'])->name('profile.update');

    Route::get('mart', [SellerMartController::class, 'index'])->name('mart.index');
    Route::put('active/mart/{mart}', [SellerMartController::class, 'activeMart'])->name('mart.active');
    Route::put('deactive/mart/{mart}', [SellerMartController::class, 'deactiveMart'])->name('mart.deactive');
    Route::get('mart/setting', [SellerMartController::class, 'show'])->name('mart.show');
    Route::put('mart/update', [SellerMartController::class, 'update'])->name('mart.update');
    Route::resource('product', SellerProductController::class);
    Route::resource('service', SellerServiceController::class);
    Route::resource('wallet', SellerWalletController::class);
    Route::resource('withdraw', SellerWithdrawController::class);
    Route::post('withdraw/wallet', [SellerWalletController::class, 'storeWithdraw'])->name('wallet.withdraw');
    Route::resource('transaction', SellerTransactionController::class);
    Route::get('/transaction/service/{order}', [SellerTransactionController::class, 'showService'])->name('transaction.serviceDetail');
    Route::put('accept/transaction/service/{order}', [SellerServiceController::class, 'acceptServiceOrder'])->name('transaction.serviceAccept');
    Route::put('reject/transaction/service/{order}', [SellerServiceController::class, 'cancelServiceOrder'])->name('transaction.serviceReject');
    Route::get('/order/product', [SellerTransactionController::class, 'indexProduct'])->name('transaction.product');
    Route::put('ship/order/{groupOrder}/product', [SellerTransactionController::class, 'shipOrder'])->name('order.ship');
    Route::get('/order/service', [SellerTransactionController::class, 'indexService'])->name('transaction.service');
});



Route::middleware('auth')->prefix('customer')->as('customer.')->group(function () {
    Route::resource('profile', CustomerProfileController::class);
    Route::resource('home', CustomerHomeController::class);
    Route::resource('order', CustomerOrderController::class);
    Route::put('complete/order/{groupOrder}', [CustomerOrderController::class, 'completingOrder'])->name('order.complete');
    Route::resource('review', CustomerReviewController::class);
    Route::resource('transaction', CustomerTransactionController::class);
    Route::resource('message', CustomerMessageController::class);
    Route::resource('service', CustomerServiceController::class);
    Route::put('complete/service/{orderId}', [CustomerServiceController::class, 'completeServieOrder'])->name('service.complete');
    Route::get('chat/{user}', [CustomerMessageController::class, 'chat'])->name('chat.detail');

    // Route::get('chat', IndexChat::class)->name('chat');

    Route::get('seller/{seller}', [CustomerHomeController::class, 'showSeller'])->name('home.showSeller');
    Route::get('seller/{seller}/product', [CustomerHomeController::class, 'showSellerProduct'])->name('home.showSeller.product');
    Route::get('seller/{seller}/service', [CustomerHomeController::class, 'showSellerService'])->name('home.showSeller.service');
    Route::get('seller/{seller}/job', [CustomerHomeController::class, 'showSellerJob'])->name('home.showSeller.job');

    Route::get('home/product/list', [CustomerHomeController::class, 'indexProduct'])->name('home.indexProduct');
    Route::get('home/product/{product}', [CustomerHomeController::class, 'showProduct'])->name('home.showProduct');

    Route::resource('cart', CustomerCartController::class);
    Route::post('checkout/cart', [CustomerCartController::class, 'checkoutCart'])->name('cart.checkout');

    Route::put('pay/transaction/{transaction}', [CustomerTransactionController::class, 'payTransaction'])->name('transaction.pay');
    Route::put('cancel/transaction/{transaction}', [CustomerTransactionController::class, 'cancelTransaction'])->name('transaction.cancel');


    Route::post('product/checkout', [CustomerTransactionController::class, 'checkoutProduct'])->name('checkout.product');
    Route::get('home/service/list', [CustomerHomeController::class, 'indexService'])->name('home.indexService');
    Route::get('home/service/{service}', [CustomerHomeController::class, 'showService'])->name('home.showService');
    Route::post('service/checkout/{service}', [CustomerTransactionController::class, 'checkoutService'])->name('checkout.service');

    // Route Lowongan Pekerjaan
    Route::get('home/job/list', [CustomerHomeController::class, 'indexJobVacancy'])->name('home.indexJobVacancy');
    Route::get('home/job/{job}', [CustomerHomeController::class, 'showJobVacancy'])->name('home.showJobVacancy');
    Route::resource('jobApply', CustomerJobApplicantController::class);

    Route::resource('mart-registration', CustomerMartRegistrationController::class);
    Route::post('checkPayment{transactionCode}', [PaymentController::class, 'checkStatus'])->name('transaction.checkStatus');
});


Route::middleware('auth')->prefix('employer')->as('employer.')->group(function () {
    Route::resource('profile', CustomerProfileController::class);
    Route::resource('job', EmployerJobVacancyController::class);
    Route::put('job/{id}/status', [EmployerJobVacancyController::class, 'updateStatus'])->name('job.updateStatus');
    Route::resource('job-applicant', EmployerJobApplicantController::class);
});









require __DIR__ . '/auth.php';
