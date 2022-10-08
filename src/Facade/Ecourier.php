<?php

namespace Codeboxr\EcourierCourier\Facade;

use Illuminate\Support\Facades\Facade;
use Codeboxr\EcourierCourier\Manage\Manage;

/**
 * @method static area()
 * @method static store()
 * @method static order()
 * @see Manage
 */
class Ecourier extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ecourier';
    }
}
