<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Member\AccountSetingController;
use App\Http\Controllers\Member\RegisterController;
use App\Http\Controllers\Member\LoginController as MemberLoginController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\MovieController as MemberMovieController;
use App\Http\Controllers\Member\PricingController;
use App\Http\Controllers\Member\TransactionController as MemberTransactionController;
use App\Http\Controllers\Member\UserPremiumController;
use App\Http\Middleware\SubscriptionMiddleware;
use App\Models\UserPremium;

;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'authenticate'])->name('admin.login.auth');

Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');

    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('transaction', [TransactionController::class, 'index'])->name('admin.transaction');

    Route::group(['prefix' => 'movie'], function () {
        Route::get('/', [MovieController::class, 'index'])->name('admin.movie');
        Route::get('/create', [MovieController::class, 'create'])->name('admin.movie.create');
        Route::post('/store', [MovieController::class, 'store'])->name('admin.movie.store');
        Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('admin.movie.edit');
        Route::put('/update/{id}', [MovieController::class, 'update'])->name('admin.movie.update');
        Route::delete('/destroy/{id}', [MovieController::class, 'destroy'])->name('admin.movie.destroy');
    });
});

Route::view('/', 'index');

Route::get('/register', [RegisterController::class, 'index'])->name('member.register');
Route::post('/register', [RegisterController::class, 'store'])->name('member.register.store');

Route::get('/login', [MemberLoginController::class, 'index'])->name('member.login');
Route::post('/login', [MemberLoginController::class, 'auth'])->name('member.login.auth');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::view('/payment-finish', 'member.payment-finish')->name('member.payment.finish');

Route::get('/account-setting', [AccountSetingController::class, 'index'])->name('member.account.setting');

Route::group(['prefix' => 'member', 'middleware' => ['auth']], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('member.dashboard');

    Route::get('/logout', [MemberLoginController::class, 'logout'])->name('member.logout');

    Route::post('transaction', [MemberTransactionController::class, 'store'])->name('member.transaction.store')->middleware(SubscriptionMiddleware::class );

    Route::get('subcription', [UserPremiumController::class, 'index'])->name('member.user_premium.index')->middleware(SubscriptionMiddleware::class );
    Route::delete('subcription/{id}', [UserPremiumController::class, 'destroy'])->name('member.user_premium.destroy')->middleware(SubscriptionMiddleware::class );

    Route::get('movie/{id}', [MemberMovieController::class, 'show'])->name('member.movie.detail')->middleware(SubscriptionMiddleware::class );
    Route::get('movie/{id}/watch', [MemberMovieController::class, 'watch'])->name('member.movie.watch')->middleware(SubscriptionMiddleware::class );

});



/*Route::group(['prefix' => 'admin'], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');

    Route::get('/movie', [MovieController::class, 'index']);
    Route::get('/movie/create', [MovieController::class, 'create']);
});*/

/* Route::get('/', function () {
    return view('welcome');
}); */
 