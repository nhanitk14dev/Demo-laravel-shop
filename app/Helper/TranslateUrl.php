<?php namespace App\Helper;

class TranslateUrl
{
    public static $locales = [];

    public static function add($locale, $transKeyNames, $attributes = [])
    {
        $link = \LaravelLocalization::getURLFromRouteNameTranslated($locale, $transKeyNames, $attributes);

        self::$locales[$locale] = $link;
    }
}