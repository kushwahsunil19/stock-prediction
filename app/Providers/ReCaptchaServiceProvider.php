<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http; // Use Laravel's HTTP client

class ReCaptchaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('captcha', function($attribute, $value, $parameters, $validator) {
            $secret = env('RECAPTCHA_SECRET_KEY');
            $response = Http::post('https://www.google.com/recaptcha/api/siteverify', [
                'secret'   => $secret,
                'response' => $value,
            ]);
       
            $responseKeys = $response->json();
             //  echo "<pre>";  print_r(  $responseKeys);die;
            return intval($responseKeys["success"]) === 1;
        });
    }

    public function register()
    {
        $this->app->singleton(ReCaptcha::class, function ($app) {
            return new ReCaptcha(env('RECAPTCHA_SECRET_KEY'));
        });
    }
}