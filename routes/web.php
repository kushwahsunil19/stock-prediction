<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PujaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminuIController;
use App\Http\Controllers\PujaPackageController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\QuizContorller;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\AboutUsController as AdminAboutUsController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\LegalNoteController;
use App\Http\Controllers\Admin\RefferLogController;
use App\Http\Controllers\Admin\EndCompetionMsgController;
use App\Http\Controllers\Frontend\{CaptchaController,HomeController, AuthController,ContactController,AboutUsController,ParticipantRuleController,EmailController,LegalController,CookieConsentController};
use App\Http\Middleware\CheckAdmin;


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
// Backend End Point
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'checkUserLoggedIn'], function () {

        // Route::get('/', [PujaController::class, 'index'])->name('Puja.index');

        Route::middleware(['auth', 'checkAdmin'])->group(function () {
            Route::resource('/dashboard',  DashboardController::class);
            Route::resource('/competitions',  CompetitionController::class);
            Route::resource('/end-competition',  EndCompetionMsgController::class);
            Route::resource('/questions',  QuizContorller::class);
            Route::resource('/participants',  ParticipantController::class);
            Route::get('/participants/export-csv', [ParticipantController::class, 'exportCsv'])->name('participants.exportCsv');
            Route::get('/all-user-export-csv/{dateRange?}/{competition_id?}/{search?}', [ParticipantController::class, 'allUserEexportCsv'])->name('all-user-export-csv');
          
            Route::get('/participants/filter', [ParticipantController::class, 'filter'])->name('participants.filter');
          
          

            // Users 
            Route::get('/accounts', [UserController::class, 'index'])->name('user.accounts');
         
            Route::get('/pending-accounts', [UserController::class, 'pendingUsers'])->name('user.pending-accounts');
            Route::get('/pending-account-export-csv', [UserController::class, 'pendingAccountEexportCsv'])->name('pending-account-export-csv');
            Route::get('/all-account-export-csv/{dateRange?}/{search?}', [UserController::class, 'allAccountEexportCsv'])->name('all-account-export-csv');
            Route::post('/update-status', [UserController::class, 'changeStatus'])->name('user.update-status');
            Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
            Route::get('/user-data', [UserController::class, 'userData'])->name('user.data');
         
            Route::resource('/aboutus',  AdminAboutUsController::class);
            Route::resource('/legal-note',  LegalNoteController::class);
            Route::resource('/contactus',  ContactUsController::class);
            Route::resource('/reffer-log',  RefferLogController::class);



        });
    });
    Route::get('/', [AuthenticationController::class, 'index'])->name('login');
    Route::get('login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('post-login', [AuthenticationController::class, 'postLogin'])->name('login.post');

    Route::get('registration', [AuthenticationController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthenticationController::class, 'postRegistration'])->name('register.post');


    Route::get('logout', [AuthenticationController::class, 'logout'])->name('admin.logout');

    Route::get('/profile/{id}/edit', [AuthenticationController::class, 'edit'])->name('profile.edit');

    Route::post('/profile/{id}/update', [AuthenticationController::class, 'update'])->name('profile.update');

    Route::get('forgot-password', [AuthenticationController::class, 'forgot_password'])->name('admin.forgot-password');
    Route::post('update-password', [AuthenticationController::class, 'update_password'])->name('admin.update-password');

    Route::get('loaders', [AdminuIController::class, 'loaders']);
   
});




// Frontend End Point.
Route::group(['middleware' => 'frontend.auth'], function () {
    Route::resource('/home',  HomeController::class);
 
    Route::get('/register/{id?}', [HomeController::class, 'register'])->name('register');  
    Route::get('/competition/{id?}', [HomeController::class, 'getSingleCompetition'])->name('competition');
    Route::get('/competitions', [HomeController::class, 'getCompetitions'])->name('competition-list');
    
    Route::post('/post-answer', [HomeController::class, 'postAnswer'])->name('post-answer');
    
 
});
Route::get('/auto-submit-answer', [HomeController::class, 'autoSubmitAnswer'])->name('auto-submit-answer');
Route::get('captcha', [CaptchaController::class, 'generateCaptcha'])->name('captcha.generate');

Route::group(['middleware' => 'cookie-consent'], function () {

// Routes that do not require authentication
Route::get('/', [HomeController::class, 'howItWork'])->name('how-it-work');
Route::get('/how-it-work', [HomeController::class, 'howItWork'])->name('how-it-work');
Route::get('/sign-in', [AuthController::class, 'index'])->name('sign-in');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');

Route::get('password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{email?}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/sign-up', [AuthController::class, 'signup'])->name('sign-up');
Route::post('/postRegistration', [AuthController::class, 'postRegistration'])->name('postRegistration');
Route::get('/user-logout', [AuthController::class, 'userLogout'])->name('user-logout');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');
Route::resource('/contact',  ContactController::class);
Route::resource('/about-us',  AboutUsController::class);


Route::resource('/rules',  ParticipantRuleController::class);
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');
Route::post('cookie-consent', [CookieConsentController::class, 'store'])->name('cookieConsent.store');

Route::get('/terms', [LegalController::class, 'terms'])->name('terms');
Route::get('/privacy', [LegalController::class, 'privacy'])->name('privacy');
Route::get('/cookie', [LegalController::class, 'cookie'])->name('cookie');
Route::get('/legal-note', [LegalController::class, 'legalNote'])->name('legal-note');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/activate/{token?}', [AuthController::class, 'activateAccount'])->name('activate');
});