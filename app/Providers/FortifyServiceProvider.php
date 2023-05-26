<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $request=request();
        if($request->is('admin/*')){
            Config::set('fortify.guard','admin');
            Config::set('fortify.passwords','admins');
            Config::set('fortify.prefix','admin');
          //  Config::set('fortify.home',RouteServiceProvider::ADMIN);

        }

        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                 if($request->user('admin')){
                     return redirect()->intended('admin/index');
                 }
                     return redirect()->intended('/user');

            }
        });
        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse {
            public function toResponse($request)
            {
                if($request->is('admin/*')){
                    return redirect()->intended('/admin/login');

                }
                    return redirect()->intended('/login');



            }
        });
        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request)
            {
//                if(!$request->is('admin/*')) {
//                    return redirect()->intended('/admin/index');
//                }
                return redirect()->intended('/user');

            }
        });



    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

//Fortify::authenticateUsing();

            if (Config::get('fortify.guard')=='web') {
                Fortify::loginView('user.auth.login');
                Fortify::registerView('user.auth.register');
                Fortify::requestPasswordResetLinkView('auth.forgot-password');
                Fortify::resetPasswordView(function($request) {
                    return view('auth.reset-password', ['request' => $request]);
                });
            }else{
                Fortify::loginView('admin.auth.login');
                Fortify::registerView('auth.error404');
                Fortify::requestPasswordResetLinkView('auth.forgot-password');
                Fortify::resetPasswordView(function($request) {
                    return view('auth.reset-password', ['request' => $request]);
                });
                }
        }

}
