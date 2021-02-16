<?php

/**
 * Helper de récupération de l'url de l'image
 */
if (!function_exists('getImage')) {
    function getImage($post, $thumb = false)
    {
        $url = "storage/photos/{$post->user->id}";
        if ($thumb) $url .= '/thumbs';
        return asset("{$url}/{$post->image}");
    }
}

/**
 * Helper de formatage des dates
 */
if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return ucfirst(utf8_encode($date->formatLocalized('%d %B %Y')));
    }
}

