<?php

use App\Models\Tenant;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        function (Router $router) {

            $tenantDomain   = request()->segment(1);
            if ($tenantDomain) {

                $tenant         = Tenant::where('domain', $tenantDomain)->first();
                if ($tenant) {
                    Config::set('database.connections.tenant.database', $tenant->database_name);
                    DB::purge('tenant');
                    DB::reconnect('tenant');
                    DB::connection('tenant')->getPdo();

                    $router->middleware('web')
                        ->prefix($tenant->domain)
                        ->group(base_path('routes/web.php'));
                    $router->middleware('web')
                        ->prefix($tenant->domain . '/admin')
                        ->group(base_path('routes/admin.php'));
                    $router->middleware('teacher')
                        ->prefix($tenant->domain . '/teacher')
                        ->group(base_path('routes/teacher.php'));
                    $router->middleware('web')
                        ->prefix('student')
                        ->group(base_path('routes/student.php'));
                } else {
                    Config::set('database.connections.tenant.database', env('DB_DATABASE'));
                    DB::purge('tenant');
                    DB::reconnect('tenant');
                    DB::connection('tenant')->getPdo();
                    $router->middleware('web')
                        ->group(base_path('routes/website.php'));

                    $router->middleware('web')
                        ->prefix('/admin')
                        ->group(base_path('routes/admin.php'));
                }
            } else {

                if (Auth::user() && Auth->user()->hasRole('super-admin')) {
                    $router->middleware('web')
                        ->prefix('/admin')
                        ->group(base_path('routes/admin.php'));
                }
                Config::set('database.connections.tenant.database', env('DB_DATABASE'));
                DB::purge('tenant');
                DB::reconnect('tenant');
                DB::connection('tenant')->getPdo();
                $router->middleware('web')
                    ->group(base_path('routes/website.php'));
            }
        },
        commands: __DIR__ . '/../routes/console.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
