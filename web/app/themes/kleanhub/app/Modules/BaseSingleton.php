<?php

namespace App\Modules;

class BaseSingleton
{
    private static array $instances = [];

    /**
     * Singleton's constructor should not be public. However, it can't be
     * private either if we want to allow subclassing.
     */
    //    protected function __construct()
    //    {
    //    }

    /**
     * Cloning and unserialization are not permitted for singletons.
     */
    protected function __clone() {}

    /**
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new \Exception('Cannot unserialize singleton');
    }

    public static function getInstance()
    {
        $subclass = static::class;
        if (! isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static;
        }

        return self::$instances[$subclass];
    }
}
