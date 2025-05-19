<?php

if (! function_exists('routeL')) {
    function routeL(string $name, array $params = [], bool $abs = true)
    {
        return route($name,
            array_merge(['locale' => app()->getLocale()], $params),
            $abs
        );
    }
}
