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
     * Start the class()
     *
     */
    public function __construct($polygon)
    {
        $this->polygon = $polygon;
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
        ])->contents();

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
        ])->contents();

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
        ])->contents();

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
        ])->contents();

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
        ])->contents();

        return (array) $contents['ticker'] ?? [];
    }

    /**
     * getTradeHistory()
     *
     * Get the ticker trade history for a given date
     *
     */
    public function getTradeHistory($ticker, $date)
    {
        $contents = (array) $this->polygon->request('historic_trades',[
            'ticker' => $ticker,
            'date' => $date
        ])->contents();

        return (array) $contents['results'] ?? [];
    }

    /**
     * getQuoteHistory()
     *
     * Get the ticker quote history for a given date
     *
     */
    public function getQuoteHistory($ticker, $date)
    {
        $contents = (array) $this->polygon->request('historic_nbbo_quotes',[
            'ticker' => $ticker,
            'date' => $date
        ])->contents();

        return (array) $contents['results'] ?? [];
    }
}
