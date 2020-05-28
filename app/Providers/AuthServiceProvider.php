<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $this->registerPolicies($gate);

        $gate->define('isCliente', function($user){
            return $user->tipo_usuario_id == 1;
        });

        $gate->define('isFuncionario', function($user){
            return $user->tipo_usuario_id == 2;
        });

        $gate->define('isGerente', function($user){
            return $user->tipo_usuario_id == 3;
        });
    }
}
