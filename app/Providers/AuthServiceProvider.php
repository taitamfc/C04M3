<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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
        /*
        role: admin 1
        role: manage 0
        */

        // Gate::before(function ($user, $ability) {
        //     if ($user->isAdministrator()) {
        //         return true;
        //     }
        // });
        
        Gate::define('xem_danh_sach',function( User $user  ){
            echo __METHOD__;die();
            dd($user);
            if( $user->isAdministrator() || $user->isManage()){
                return true;
            }
            return false;
        });

        Gate::define('them',function( User $user  ){
            if( $user->isAdministrator() || $user->isManage()){
                return true;
            }
            return false;
        });
        Gate::define('edit',function( User $user  ){
            if($user->role == 'admin' || $user->isManage()){
                return true;
            }
            return false;
        });

        Gate::define('delete',function( User $user  ){
            // return false;

            if($user->isAdministrator()){
                return true;
            }
            return false;
        });
    }
}
