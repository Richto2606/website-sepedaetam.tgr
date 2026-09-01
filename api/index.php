<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

// Vercel serverless: Lambda filesystem is ephemeral and read-only outside
// the /tmp dir. Force Laravel to write compiled views / framework cache
// to /tmp so cold starts don't fatal on read-only storage.
if (getenv('APP_ENV') === 'production') {
    $tmpViews = sys_get_temp_dir().'/framework/views';
    if (!is_dir($tmpViews)) {
        @mkdir($tmpViews, 0777, true);
    }
    $_ENV['VIEW_COMPILED_PATH'] = $tmpViews;
    putenv('VIEW_COMPILED_PATH='.$tmpViews);
}

$app = require_once __DIR__.'/../bootstrap/app.php';

// Auto-migrate a fresh database on first cold start. Serverless has no
// persistent shell to run `php artisan migrate --seed`, so bootstrap it
// here. Guarded so it only runs when the migrations table is absent.
if (getenv('AUTO_MIGRATE') === 'true') {
    try {
        $kernel = $app->make(Kernel::class);
        $kernel->bootstrap();
        if (!Schema::hasTable('migrations')) {
            $kernel->call('migrate', ['--force' => true]);
            $kernel->call('db:seed', ['--force' => true]);
        }
    } catch (Throwable $e) {
        error_log('[vercel] auto-migrate skipped: '.$e->getMessage());
    }
}

$app->handleRequest(Request::capture());
