<?php

// Check input error

use App\Models\Company;

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

// Check Company Profile Completion
if (!function_exists('isCompanyProfileComplete')) {
    function isCompanyProfileComplete(): bool
    {
        $requiredFields = [
            'logo',
            'banner',
            'bio',
            'vision',
            'name',
            'industry_type_id',
            'organization_size_id',
            'team_size_id',
            'establishment_date',
            'phone',
            'email',
            'country',
        ];

        $companyInfo = Company::where('user_id', auth()->user()->id)->first();

        foreach ($requiredFields as $field) {
            if (empty($companyInfo->$field)) {
                return false;
            }
        }
        return true;
    }
}
