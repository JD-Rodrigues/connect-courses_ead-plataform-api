<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SupportReplyController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

Route::get('/', function() {
    return 'Aqui começa nossa API';
});

Route::post('/login', [AuthController::class, 'authenticateUser']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/me', [AuthController::class, 'getAuthenticatedUser']);
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);
    Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);
    Route::get('/supports', [SupportController::class, 'index']);
    Route::get('/my-supports', [SupportController::class, 'showMySupports']);
    Route::post('/supports', [SupportController::class, 'store']);
    Route::post('/support-replies', [SupportReplyController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logoutUser']);
}); 

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? "Link de redefinição de senha enviado para o e-mail $request->input('email)."
                : "Houve um erro: $status";
})->middleware('guest')->name('password.reset');

