<?php

/**
 * app init
 */
$app = new PSharp\Core\Application(dirname(__DIR__));

/**
 * let's add service providers
 */
$app->provide(PSharp\Log\LogProvider::class)
	->provide(PSharp\Auth\AuthProvider::class)
	->provide(PSharp\DB\DatabaseProvider::class)
	->provide(PSharp\View\ViewProvider::class)
	->provideIfExists(Rovi\Providers\PSharp\RoviProvider::class);

/**
 * let's map controllers and routes
 */
$app->mapControllers('App\Controllers')
	->mapConsoleCommands('App\Console');

/**
 * let's add middleware
 */
$app->useMiddleware(App\Middleware\AuditMiddleware::class)
	->useMiddleware(PSharp\Auth\Middleware\AuthenticatesRequests::class);

/**
 * now let's run the app
 */
$app->run();
