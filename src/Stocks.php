<?php namespace Polygon;

class Stocks
{
    /**
     * Polygon access
     *
     * @return Polygon
     */
    private $polygon;

    /**
     * Request timeout
     *
     * @return int
     */
    private $timeout;

    /**
     * Start the class()
     *
     */
    public function __construct($polygon) {
        $this->polygon = $polygon;
    }

     /**
     * timeout()
     *
     * Set the timeout for this request
     *
     */
    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * getLastTrade()
     *
     * Get the last trade 
     *
     */
    public function getLastTrade($ticker)
    {
        $contents = (array) $this->polygon->request('last_trade',[
            'symbol' => $ticker
        ],$this->timeout)->contents();

        return (array) $contents['last'] ?? [];
    }

    /**
     * getLastQuote()
     *
     * Get the last quote 
     *
     */
    public function getLastQuote($ticker)
    {
        $contents = (array) $this->polygon->request('last_quote',[
            'symbol' => $ticker
        ],$this->timeout)->contents();

        return (array) $contents['last'] ?? [];
    }

    /**
     * getDetails()
     *
     * Get the stock ticker  details
     *
     */
    public function getDetails($ticker)
    {
        $contents = (array) $this->polygon->request('ticker_details',[
            'symbol' => $ticker
        ],$this->timeout)->contents();

        return (array) $contents ?? [];
    }

    /**
     * getNews()
     *
     * Get the stock ticker news
     *
     */
    public function getNews($ticker, $page = 1, $limit = 50)
    {
        $contents = (array) $this->polygon->request('ticker_news',['symbol' => $ticker],[
            'page' => $page,
            'limit' => $limit
        ],$this->timeout)->contents();

        return (array) $contents ?? [];
    }

    /**
     * getSnapshot()
     *
     * Get the ticker snapshot
     *
     */
    public function getSnapshot($ticker)
    {
        $contents = (array) $this->polygon->request('ticker_snapshot',[
            'ticker' => $ticker
        ],$this->timeout)->contents();

        return (array) $contents['ticker'] ?? [];
    }

    /**
     * getTradeHistory()
     *
     * Get the ticker trade history for a given date
     *
     */
    public function getTradeHistory($ticker, $date, $limit = 100, $timestampOffset = 0)
    {
        $contents = (array) $this->polygon->request('historic_trades',[
            'ticker' => $ticker,
            'date' => $date,
            'limit' => $limit,
            'offset' => $timestampOffset
        ],$this->timeout)->contents();

        // return (array) $contents['results'] ?? [];
        return (array) $contents['ticks'] ?? [];
    }

    /**
     * getQuoteHistory()
     *
     * Get the ticker quote history for a given date
     *
     */
    public function getQuoteHistory($ticker, $date, $limit = 100)
    {
        $contents = (array) $this->polygon->request('historic_nbbo_quotes',[
            'ticker' => $ticker,
            'date' => $date,
            'limit' => $limit
        ],$this->timeout)->contents();

        return (array) $contents['results'] ?? [];
    }
}
