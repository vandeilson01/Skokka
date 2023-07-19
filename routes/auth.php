<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\AdminAuthenticationController;
use App\Http\Controllers\Acompanhantes\AcompanhantesAuthenticationController;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\Acompanhantes;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Plans;
use App\Http\Controllers\Anuncios;
use App\Http\Controllers\MeusAnuncios;
use App\Http\Controllers\MeusPlans;
use App\Http\Controllers\Assinaturas;
use App\Http\Controllers\AllAssinaturas;
use App\Http\Controllers\AllAnuncios;
use App\Http\Controllers\AllAnunciosImg;
use App\Http\Controllers\AllAnunciosHora;
use App\Http\Controllers\MercadoPagos;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\CategoriasPlus;

 
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
 
Route::get('mercadopago/pagamento/{colletion_id}', [MercadoPagos::class, 'pagamento']);


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminAuthenticationController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthenticationController::class, 'postLogin'])->name('adminLoginPost');
    Route::post('/logout', [AdminAuthenticationController::class, 'adminLogout'])->name('adminLogout');
 
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('panel', function () {
            return view('adm.panel');
        })->name('adminPanel');

        Route::post('user/update', [AdminAuthenticationController::class, 'upload']);

        Route::get('clientesi', function(){
            return view('adm.clientes');
        });

        Route::resource('clientes', Clientes::class);
        Route::resource('acompanhantes', Acompanhantes::class);
        Route::resource('planos', Plans::class);
        Route::resource('pagamentos', Payment::class);

        Route::resource('assinaturas', AllAssinaturas::class);
        // Route::post('assinaturas/store', [AllAssinaturas::class, 'store']);
        // Route::put('assinaturas/{id}', [AllAssinaturas::class, 'store']);
 
        Route::resource('allanuncios', AllAnuncios::class);
        Route::post('allanuncios/store', [AllAnuncios::class, 'store']);
        Route::put('allanuncios/update/{id}', [AllAnuncios::class, 'update']);


        Route::resource('allanunciosimg', AllAnunciosImg::class);
        Route::post('allanunciosimg/store', [AllAnunciosImg::class, 'store']);
        Route::put('allanunciosimg/update/{id}', [AllAnunciosImg::class, 'update']);


        Route::resource('allanuncioshora', AllAnunciosHora::class);
        Route::post('allanuncioshora/store', [AllAnunciosHora::class, 'store']);
        Route::put('allanuncioshora/update/{id}', [AllAnunciosHora::class, 'update']);

        Route::resource('categoriasplus', CategoriasPlus::class);
        Route::post('categoriasplus/store', [CategoriasPlus::class, 'store']);
        Route::put('categoriasplus/update/{id}', [CategoriasPlus::class, 'update']);

        Route::resource('mercadopago', MercadoPagos::class);
        Route::post('mercadopago/store', [MercadoPagos::class, 'store']);
        Route::put('mercadopago/update/{id}', [MercadoPagos::class, 'update']);
        Route::get('mercadopago/pagamento/{colletion_id}', [MercadoPagos::class, 'pagamento']);

        Route::resource('pagamentos', Payment::class);

        Route::resource('categorias', Categorias::class);
 
    });
});

// 

// Route::get('acompanhantes/mercadopago/success', [MercadoPagos::class, 'success']);
// Route::get('acompanhantes/mercadopago/failure', [MercadoPagos::class, 'failure']);
// Route::get('acompanhantes/mercadopago/pending', [MercadoPagos::class, 'pending']);

Route::group(['prefix' => 'acompanhantes'], function () {
    Route::get('/login', [AcompanhantesAuthenticationController::class, 'getLogin'])->name('AcomLogin');
    Route::post('/login', [AcompanhantesAuthenticationController::class, 'postLogin'])->name('AcomLoginPost');
    Route::post('/logout', [AcompanhantesAuthenticationController::class, 'AcomLogout'])->name('AcomLogout');

    Route::get('termos', function () {
        return view('acom.termos');
    });

    Route::resource('anuncios', Anuncios::class);

    Route::post('anuncios/store', [Anuncios::class, 'store']);

    Route::get('mais', [MercadoPagos::class, 'mais']);
    Route::get('mercadopago/success', [MercadoPagos::class, 'success']);
    Route::get('mercadopago/failure', [MercadoPagos::class, 'failure']);
    Route::get('mercadopago/pending', [MercadoPagos::class, 'pending']);

    Route::get('publicar', function () {
        return view('home.publicar');
    });

    Route::post('user/update', [AcompanhantesAuthenticationController::class, 'upload']);

    Route::group(['middleware' => 'acomauth'], function () {
        Route::get('panel', function () {
            return view('acom.panel');
        })->name('acomPanel');

        Route::get('configuracoes', function () {
            return view('acom.config');
        });
 
        Route::resource('meus-anuncios', MeusAnuncios::class);

        Route::post('meus-anuncios/store', [MeusAnuncios::class, 'store']);

        Route::resource('meus-planos', Assinaturas::class);



        Route::get('allpublicar', function () {
            return view('acom.publicar');
        });
        
 
       
    });
 
});