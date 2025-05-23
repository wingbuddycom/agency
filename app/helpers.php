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
    function menu_label(string $key): string
    {
        return __('content.' . $key);
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
                        return $group['bannerImage'] ?? null;
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

