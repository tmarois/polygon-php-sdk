<?php namespace Polygon;

use Polygon\Stocks;

class Polygon
{

    /**
     * API Key
     *
     * @var string
     */
    private $key;

    /**
     * setKey()
     *
     * @return self
     */
    public static function setKey($id)
    {
        $this->key = $id;

        return $this;
    }

    /**
     * stocks()
     *
     * Load the stocks API
     *
     * @return Polygon\Stocks
     */
    public static function stocks()
    {
        return (new Stocks($this));
    }

    /**
     * crypto()
     *
     * Load up the crypto API
     *
     * @return Polygon\Crypto
     */
    public static function crypto()
    {
        // return (new Crypto($this));
    }
}
