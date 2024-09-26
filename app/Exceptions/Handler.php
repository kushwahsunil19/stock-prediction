<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
// use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;

use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function render($request, Throwable $e)
    {
        if ($e instanceof PostTooLargeException) {
            URL::defaults(['_token' => csrf_token()]);
            // die('lllllll');
            // return Redirect('account')->withError('hhhh');
            return response()->json(['error' => 'The uploaded file exceeds the maximum allowed size.'], 422);
        }
    
        return parent::render($request, $e);
    }
    

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
