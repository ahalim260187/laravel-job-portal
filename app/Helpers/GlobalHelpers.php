<?php

// Check input error
if (!function_exists('hasError')) {
    function hasError($errors, string $name): ?string
    {
        return $errors->has($name) ? 'is-invalid' : '';
    }
}

// Set Sidebar active
// cara1
// if (!function_exists('setSidebarActive')) {
//     function setSidebarActive(array $routes): string
//     {
//         return in_array(Route::currentRouteName(), $path) ? 'active' : '';
//     }
// }

// cara2
if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes): string
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return '';
    }
}
