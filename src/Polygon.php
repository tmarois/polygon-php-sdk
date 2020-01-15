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
     * API root
     *
     * @var array
     */
    private $root = 'https://api.polygon.io/';

    /**
     * API Paths
     *
     * @var array
     */
    private $paths = [
        "markets"              => "v2/reference/markets",
        "market_status"        => "v1/marketstatus/now",
        "market_holidays"      => "v1/marketstatus/upcoming",
        "market_tickers"       => "v2/snapshot/locale/us/markets/stocks/tickers",

        "market_gainers"       => "v2/snapshot/locale/us/markets/stocks/gainers",
        "market_losers"        => "v2/snapshot/locale/us/markets/stocks/losers",

        "ticker_types"         => "v2/reference/types",
        "tickers"              => "v2/reference/tickers",
        "ticker_details"       => "v1/meta/symbols/{symbol}/company",
        "ticker_news"          => "v1/meta/symbols/{symbol}/news",
        "ticker_snapshot"      => "v2/snapshot/locale/us/markets/stocks/tickers/{ticker}",
    
        "historic_quotes"      => "v1/historic/quotes/{symbol}/{date}",
        // "historic_trades"      => "v2/ticks/stocks/trades/{ticker}/{date}",
        "historic_trades"      => "v1/historic/trades/{ticker}/{date}",
        "historic_nbbo_quotes" => "v2/ticks/stocks/nbbo/{ticker}/{date}",
        "last_trade"           => "v1/last/stocks/{symbol}",
        "last_quote"           => "v1/last_quote/stocks/{symbol}",

        "condition_trades"     => "v1/meta/conditions/trades",
        "condition_quotes"     => "v1/meta/conditions/quotes"
    ];

    /**
     * Set polygon 
     *
     */
    public function __construct($id = '') {
        $this->setKey($id);
    }

    /**
     * setKey()
     *
     * @return self
     */
    public function setKey($id)
    {
        $this->key = $id;

        return $this;
    }

    /**
     * getKey()
     *
     * @return string
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * getRoot()
     *
     * @return string
     */
    public function getRoot() {
        return $this->root;
    }

     /**
     * getPath()
     *
     * @return string
     */
    public function getPath($handle) {
        return $this->paths[$handle] ?? false;
    }

    /**
     * request()
     *
     * @return Polygon\Request
     */
    public function request($handle, $params = [], $timeout = 6) {
        return (new Request($this, $timeout))->send($handle, $params);
    }

    /**
     * stocks()
     *
     * Load the stocks API
     *
     * @return Polygon\Stocks
     */
    public function stocks() {
        return (new Stocks($this));
    }

    /**
     * crypto()
     *
     * Load up the crypto API
     *
     * @return Polygon\Crypto
     */
    public function crypto() {
        // return (new Crypto($this));
    }
}
