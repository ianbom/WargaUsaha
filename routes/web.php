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





Route::view('/analytics', 'analytics');
Route::view('/finance', 'finance');
Route::view('/crypto', 'crypto');

Route::view('/apps/chat', 'apps.chat');
Route::view('/apps/mailbox', 'apps.mailbox');
Route::view('/apps/todolist', 'apps.todolist');
Route::view('/apps/notes', 'apps.notes');
Route::view('/apps/scrumboard', 'apps.scrumboard');
Route::view('/apps/contacts', 'apps.contacts');
Route::view('/apps/calendar', 'apps.calendar');

Route::view('/apps/invoice/list', 'apps.invoice.list');
Route::view('/apps/invoice/preview', 'apps.invoice.preview');
Route::view('/apps/invoice/add', 'apps.invoice.add');
Route::view('/apps/invoice/edit', 'apps.invoice.edit');

Route::view('/components/tabs', 'ui-components.tabs');
Route::view('/components/accordions', 'ui-components.accordions');
Route::view('/components/modals', 'ui-components.modals');
Route::view('/components/cards', 'ui-components.cards');
Route::view('/components/carousel', 'ui-components.carousel');
Route::view('/components/countdown', 'ui-components.countdown');
Route::view('/components/counter', 'ui-components.counter');
Route::view('/components/sweetalert', 'ui-components.sweetalert');
Route::view('/components/timeline', 'ui-components.timeline');
Route::view('/components/notifications', 'ui-components.notifications');
Route::view('/components/media-object', 'ui-components.media-object');
Route::view('/components/list-group', 'ui-components.list-group');
Route::view('/components/pricing-table', 'ui-components.pricing-table');
Route::view('/components/lightbox', 'ui-components.lightbox');

Route::view('/elements/alerts', 'elements.alerts');
Route::view('/elements/avatar', 'elements.avatar');
Route::view('/elements/badges', 'elements.badges');
Route::view('/elements/breadcrumbs', 'elements.breadcrumbs');
Route::view('/elements/buttons', 'elements.buttons');
Route::view('/elements/buttons-group', 'elements.buttons-group');
Route::view('/elements/color-library', 'elements.color-library');
Route::view('/elements/dropdown', 'elements.dropdown');
Route::view('/elements/infobox', 'elements.infobox');
Route::view('/elements/jumbotron', 'elements.jumbotron');
Route::view('/elements/loader', 'elements.loader');
Route::view('/elements/pagination', 'elements.pagination');
Route::view('/elements/popovers', 'elements.popovers');
Route::view('/elements/progress-bar', 'elements.progress-bar');
Route::view('/elements/search', 'elements.search');
Route::view('/elements/tooltips', 'elements.tooltips');
Route::view('/elements/treeview', 'elements.treeview');
Route::view('/elements/typography', 'elements.typography');

Route::view('/charts', 'charts');
Route::view('/widgets', 'widgets');
Route::view('/font-icons', 'font-icons');
Route::view('/dragndrop', 'dragndrop');

Route::view('/tables', 'tables');

Route::view('/datatables/advanced', 'datatables.advanced');
Route::view('/datatables/alt-pagination', 'datatables.alt-pagination');
Route::view('/datatables/basic', 'datatables.basic');
Route::view('/datatables/checkbox', 'datatables.checkbox');
Route::view('/datatables/clone-header', 'datatables.clone-header');
Route::view('/datatables/column-chooser', 'datatables.column-chooser');
Route::view('/datatables/export', 'datatables.export');
Route::view('/datatables/multi-column', 'datatables.multi-column');
Route::view('/datatables/multiple-tables', 'datatables.multiple-tables');
Route::view('/datatables/order-sorting', 'datatables.order-sorting');
Route::view('/datatables/range-search', 'datatables.range-search');
Route::view('/datatables/skin', 'datatables.skin');
Route::view('/datatables/sticky-header', 'datatables.sticky-header');

Route::view('/forms/basic', 'forms.basic');
Route::view('/forms/input-group', 'forms.input-group');
Route::view('/forms/layouts', 'forms.layouts');
Route::view('/forms/validation', 'forms.validation');
Route::view('/forms/input-mask', 'forms.input-mask');
Route::view('/forms/select2', 'forms.select2');
Route::view('/forms/touchspin', 'forms.touchspin');
Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
Route::view('/forms/switches', 'forms.switches');
Route::view('/forms/wizards', 'forms.wizards');
Route::view('/forms/file-upload', 'forms.file-upload');
Route::view('/forms/quill-editor', 'forms.quill-editor');
Route::view('/forms/markdown-editor', 'forms.markdown-editor');
Route::view('/forms/date-picker', 'forms.date-picker');
Route::view('/forms/clipboard', 'forms.clipboard');

Route::view('/users/profile', 'users.profile');
Route::view('/users/user-account-settings', 'users.user-account-settings');

Route::view('/pages/knowledge-base', 'pages.knowledge-base');
Route::view('/pages/contact-us-boxed', 'pages.contact-us-boxed');
Route::view('/pages/contact-us-cover', 'pages.contact-us-cover');
Route::view('/pages/faq', 'pages.faq');
Route::view('/pages/coming-soon-boxed', 'pages.coming-soon-boxed');
Route::view('/pages/coming-soon-cover', 'pages.coming-soon-cover');
Route::view('/pages/error404', 'pages.error404');
Route::view('/pages/error500', 'pages.error500');
Route::view('/pages/error503', 'pages.error503');
Route::view('/pages/maintenence', 'pages.maintenence');

Route::view('/auth/boxed-lockscreen', 'auth.boxed-lockscreen');
Route::view('/auth/boxed-signin', 'auth.boxed-signin');
Route::view('/auth/boxed-signup', 'auth.boxed-signup');
Route::view('/auth/boxed-password-reset', 'auth.boxed-password-reset');
Route::view('/auth/cover-login', 'auth.cover-login');
Route::view('/auth/cover-register', 'auth.cover-register');
Route::view('/auth/cover-lockscreen', 'auth.cover-lockscreen');
Route::view('/auth/cover-password-reset', 'auth.cover-password-reset');



require __DIR__ . '/auth.php';
