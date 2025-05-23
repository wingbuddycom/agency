<?php

if (!function_exists('routeL')) {
    function routeL(string $name, array $params = [], bool $abs = true)
    {
        return route($name,
            array_merge(['locale' => app()->getLocale()], $params),
            $abs
        );
    }
}

if (!function_exists('menu_label')) {
    function menu_label(string $routeName = null): ?string
    {
        $routeName = $routeName ?? \Illuminate\Support\Facades\Route::currentRouteName();

        foreach (config('menu') as $group) {
            // Check nested structure like 'agency.items'
            if (isset($group['items']) && is_array($group['items'])) {
                foreach ($group['items'] as $item) {
                    if (($item['route'] ?? null) === $routeName) {
                        return __('content.' . ($item['key'] ?? ''));
                    }
                }
            }

            if (is_array($group) && isset($group[0]) && is_array($group[0])) {
                foreach ($group as $item) {
                    if (($item['route'] ?? null) === $routeName) {
                        return __('content.' . ($item['key'] ?? ''));
                    }
                }
            }
        }

        return null;
    }
}


if (!function_exists('menu_banner')) {
    function menu_banner(string $routeKey = null): ?string
    {
        $routeKey = $routeKey ?? Route::currentRouteName();

        foreach (config('menu') as $group) {
            if (!is_array($group)) continue;

            if (isset($group['items']) && is_array($group['items'])) {
                foreach ($group['items'] as $item) {
                    if (isset($item['route']) && $item['route'] === $routeKey) {
                        return $item['bannerImage'] ?? null;
                    }
                }
            }

            foreach ($group as $item) {
                if (is_array($item) && isset($item['route']) && $item['route'] === $routeKey) {
                    return $item['bannerImage'] ?? null;
                }
            }
        }

        return null;
    }
}

