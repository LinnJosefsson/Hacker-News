<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index')->name('login');
Route::post('login', LoginController::class);
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::get('logout', LogoutController::class)->name('logout');

//register account
Route::view('/register', 'register')->middleware('guest');
Route::post('register', RegisterController::class)->middleware('guest');

Route::get('/usersprofile/index', function () {
    return view('/usersprofile/index');
})->name('userprofile');


Route::resource('users', UserController::class);
Route::resource('post', PostController::class);

//delete post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// like/unlike
Route::middleware('auth')->group(function () {
    Route::post('like', 'LikeController@like')->name('like');
    Route::delete('like', 'LikeController@unlike')->name('unlike');
});


//update password
Route::post(
    'usersprofile/update-password',
    function (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);
        return redirect()
            ->back()
            ->with('passwordSuccess', 'Your password has been changed!');

        /* $status = Password::reset(
            $request->only(
                'email',
                'password',
                'password_confirmation'
            ),
            function ($user, $password) {
                /*  $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60)); */
        /*
                $user->update(['password' => Hash::make($password)]);

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('userprofile')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);  */
    }
)->middleware('auth');


//forgot password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

//This route will be responsible for validating the email address
//and sending the password reset request to the corresponding user
Route::post('/forgot-password', function (Request $request) {

    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//This route will receive a token parameter that we will use later to verify the password reset request:
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

//This route will be responsible for validating the incoming request and updating the user's password in the database:

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only(
            'email',
            'password',
            'password_confirmation',
            'token'
        ),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
