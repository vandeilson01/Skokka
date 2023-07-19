<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\Models\CategoryPlus;
use App\Models\Category;

Route::get('{procurar}/{categories?}/{state?}/{city?}/{terms?}', function($procurar= 'procurar',$categories='', $state='', $city='', $terms=''){
    
    if('procurar' == $procurar ){

        return view('home.search', [
            'categories' =>  $categories ?? '',
            'state' =>  $state ?? '',
            'city' =>  $city ?? '',
            'terms' =>  $terms ?? '',
        ]);

    }
})->where(
    array(
        'procurar' => '(procurar)'
    )
);


Route::post('procurar-pesquisa', function(Request $request){
    
        return view('home.searchtwo', [
            'state' =>  $request->input('state') ?? '',
            'city' =>  $request->input('city') ?? '',
            'categories' =>  $request->input('categories') ?? '',
            'terms' =>  $request->input('terms') ?? '',
        ]);

});

Route::get('{ver}/{nameid?}', function($ver= 'ver',$nameid=''){
    
    if('ver' == $ver ){

        return view('ads.page', [
            'nameid' =>  $nameid ?? '',
        ]);

    }
})->where(
    array(
        'ver' => '(ver)'
    )
);



