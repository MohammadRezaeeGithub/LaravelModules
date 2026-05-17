<?php



namespace App\Modules\AccessControl\Providers;

use App\Modules\AccessControl\Http\Midlleware\RoleMiddleware;
use App\Modules\AccessControl\Models\Permission;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


class AccessControlServiceProvider extends ServiceProvider{

    public function register()
    {

    }

    public function boot(Router $router){

        $this->loadMigrationsFrom(__DIR__ .'/../Database/migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../Database/factories');
        $this->loadViewsFrom(__DIR__ . '/../resources/views','AccessControl');
        $this->loadRoutesFrom(__DIR__ . '/../routes/access_control_routes.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'AccessControl');

        //registering the middleware
        $router->aliasMiddleware('AccessControl.role',RoleMiddleware::class);

        //using the Laravel's gate gives us the possbility to use Blade's helper or middelwares
        //to introduce all the permissiions to Laravel so we can use its CAN method to see if the user has that permission.
            Permission::all()->map(function($permission){
                //beacuse we call the CAN mehtod on a user, so we have the user here
                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            });

            Blade::if('role',function($role){
               return auth()->check() && auth()->user()->hasRole($role);
            });
    }
}
