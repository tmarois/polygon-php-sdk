<?php namespace Polygon;

use GuzzleHttp\Client;

class Stocks
{
    /**
     * Polygon access
     *
     * @return Polygon
     */
    private $polygon;

    /**
     * Start the class()
     *
     */
    public function __construct(Polygon $polygon)
    {
        $this->polygon = $polygon;
    }

    /**
     * getDetails()
     *
     * Get the stock ticker  details
     *
     */
    public static function getDetails()
    {

    }

    /**
     * getNews()
     *
     * Get the stock ticker news
     *
     */
    public static function getNews()
    {

    }
}
