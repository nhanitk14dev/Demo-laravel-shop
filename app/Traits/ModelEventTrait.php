<?php namespace App\Traits;

trait ModelEventTrait
{
    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            static::deleteCache();
        });

        static::updated(function () {
            static::deleteCache();
        });

        static::deleted(function () {
            static::deleteCache();
        });
    }


    protected static function deleteCache()
    {
        if (isset(static::$caches)) {
            $caches = static::$caches;
            foreach ($caches as $key) {
                if($key === 'all'){
                    \Cache::flush();
                }
                else{
                    \Cache::forget($key);
                }
            }
        }
    }
}
