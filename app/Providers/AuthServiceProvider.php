<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Bike' =>'App\Policies\BikePolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable,$url){
            // traducira email de validacion
            return (new MailMessage)
                   ->subject('Verificar email')
                   ->greeting('Hola')
                   ->salutation('Un saludo')
                   ->line('Haz clic en la siguiente línea para verificar tu email.')
                   ->action('Verificar email', $url);
        });
        
        // gate para autorizar el borrado de una moto , tras la prueba la borramos 
        //puesto que la implementacion final con policies
//             Gate::define('borrarMoto', function($user, $bike){
                
//                 return $user->id == $bike->user_id;
                
//             });
    }
}
