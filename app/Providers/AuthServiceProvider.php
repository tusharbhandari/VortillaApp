<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Auth;
use App\Usermaster;
use App\Services\AuthService;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Auth::viaRequest('custom-token', function ($request) {

        //     $error = false;
             

        //      $token = ltrim($request->header('Authorization'), "Bearer");
        //      $token = trim($token);

        //      //$authService->secret = $request->header('Authorization');

             
        // });
    }
}
