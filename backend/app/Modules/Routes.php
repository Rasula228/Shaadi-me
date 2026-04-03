<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Module API Routes
|--------------------------------------------------------------------------
|
| This file loads all module routes. Each module has its own Routes folder
| with an api.php file that defines the module's API endpoints.
|
*/

// Load all module routes
$modulesPath = __DIR__ . '/Modules';

if (is_dir($modulesPath)) {
    $modules = scandir($modulesPath);
    
    foreach ($modules as $module) {
        if ($module === '.' || $module === '..') continue;
        
        $routesFile = $modulesPath . '/' . $module . '/Routes/api.php';
        
        // Try different route file names
        if (!file_exists($routesFile)) {
            $routesFile = $modulesPath . '/' . $module . '/Routes/' . $module . 'api.php';
        }
        if (!file_exists($routesFile)) {
            $routeFiles = glob($modulesPath . '/' . $module . '/Routes/*.php');
            if (!empty($routeFiles)) {
                $routesFile = $routeFiles[0];
            }
        }
        
        if (file_exists($routesFile)) {
            require $routesFile;
        }
    }
}
