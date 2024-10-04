<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Member\AccountSetingController;
use App\Http\Controllers\Member\AccountSettingController;
use App\Http\Controllers\Member\RegisterController;
use App\Http\Controllers\Member\LoginController as MemberLoginController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\FavoriteMovieController;
use App\Http\Controllers\Member\MovieController as MemberMovieController;
use App\Http\Controllers\Member\PlaylistController;
use App\Http\Controllers\Member\PricingController;
use App\Http\Controllers\Member\TransactionController as MemberTransactionController;
use App\Http\Controllers\Member\UserPremiumController;
use App\Http\Controllers\Member\VerifyController;
use App\Http\Middleware\IsEmailVerified;
use App\Http\Middleware\SubscriptionMiddleware;
use App\Models\UserPremium;
use App\Notifications\OtpNotification;

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

Route::get('/account-setting/{id}', [AccountSettingController::class, 'index'])->name('account.setting');
Route::get('/account-setting/edit/{id}', [AccountSettingController::class, 'edit'])->name('account.setting.edit');
Route::put('/account-setting/update/{id}', [AccountSettingController::class, 'update'])->name('account.setting.update');

Route::get('/password/{id}', [AccountSettingController::class, 'indexPassword'])->name('password')->middleware(IsEmailVerified::class);
Route::post('/password/update/{id}', [AccountSettingController::class, 'changePassword'])->name('password.update')->middleware(IsEmailVerified::class);

Route::get('/favorite-movie', [FavoriteMovieController::class, 'index'])->name('favorite.movie');
Route::delete('/favorite-movie/{id}', [FavoriteMovieController::class, 'destroy'])->name('favorite.movie.destroy');

Route::get('/playlists', [PlaylistController::class, 'index'])->name('member.playlists');
Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('member.playlists.detail');

Route::get('/otp/verify', [VerifyController::class, 'showVerifyForm'])->name('otp.verify');
Route::post('/otp/verify', [VerifyController::class, 'verifyOtp'])->name('otp.verify.post');


Route::group(['prefix' => 'member', 'middleware' => ['auth']], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('member.dashboard');

    Route::get('/logout', [MemberLoginController::class, 'logout'])->name('member.logout');

    Route::post('transaction', [MemberTransactionController::class, 'store'])->name('member.transaction.store')->middleware(SubscriptionMiddleware::class );

    Route::get('subcription', [UserPremiumController::class, 'index'])->name('member.user_premium.index')->middleware(SubscriptionMiddleware::class );
    Route::delete('subcription/{id}', [UserPremiumController::class, 'destroy'])->name('member.user_premium.destroy')->middleware(SubscriptionMiddleware::class );

    Route::get('movie/{id}', [MemberMovieController::class, 'show'])->name('member.movie.detail')->middleware(SubscriptionMiddleware::class);
    Route::post('movie/{id}/like', [MemberMovieController::class, 'like'])->name('member.movie.like')->middleware(SubscriptionMiddleware::class);
    Route::get('movie/{id}/watch', [MemberMovieController::class, 'watch'])->name('member.movie.watch')->middleware(SubscriptionMiddleware::class );
    Route::post('movie/{id}/playlist', [MemberMovieController::class, 'addToPlaylist'])->name('member.movie.playlist')->middleware(SubscriptionMiddleware::class);
    Route::delete('movie/{movieId}/playlist/{playlistId}', [MemberMovieController::class, 'deleteFromPlaylist'])->name('member.movie.playlist.delete')->middleware(SubscriptionMiddleware::class);

});

/* // Rute untuk menampilkan daftar film favorit
Route::get('favorites/{userId}', [FavoriteMovieController::class, 'favoriteMovies'])->name('member.favorite-movies');
// Rute untuk menambahkan atau menghapus film dari daftar favorit
Route::post('movie/{movieId}/like/{userId}', [FavoriteMovieController::class, 'likeMovie'])->name('member.movie.like');
 */


/*Route::group(['prefix' => 'admin'], function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');

    Route::get('/movie', [MovieController::class, 'index']);
    Route::get('/movie/create', [MovieController::class, 'create']);
});*/

/* Route::get('/', function () {
    return view('welcome');
}); */
 