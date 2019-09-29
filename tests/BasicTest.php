<?php  namespace Polygon;

use Polygon\Polygon;

class BasicTest extends \PHPUnit\Framework\TestCase
{

    public function testLastTrade()
    {
        $polygon = new Polygon("AKBZMCY0A80HTKZ59D4P");
        $response = $polygon->stocks()->getLastTrade('DWT');

        // print_r($response);

        $this->assertEquals(4, count($response));
    }

    public function testLastQuote()
    {
        $polygon = new Polygon("AKBZMCY0A80HTKZ59D4P");
        $response = $polygon->stocks()->getLastQuote('DWT');

        // print_r($response);

        $this->assertEquals(7, count($response));
    }

    public function testGetDetails()
    {
        $polygon = new Polygon("AKBZMCY0A80HTKZ59D4P");
        $response = $polygon->stocks()->getDetails('DWT');

        // print_r($response);

        $this->assertEquals('DWT', ($response['symbol'] ?? ''));
    }

    // public function testTradeHistory()
    // {
    //     $polygon = new Polygon("AKBZMCY0A80HTKZ59D4P");
    //     $response = $polygon->stocks()->getTradeHistory('DWT','2019-09-25');

    //     print_r($response);

    //     // $this->assertEquals('DWT', ($response['symbol'] ?? ''));
    // }

    public function testQuoteHistory()
    {
        $polygon = new Polygon("AKBZMCY0A80HTKZ59D4P");
        $response = $polygon->stocks()->getQuoteHistory('DWT','2019-09-25');

        print_r($response);

        // $this->assertEquals('DWT', ($response['symbol'] ?? ''));
    }

    // public function testSingleSnapshot()
    // {
    //     $polygon = new Polygon("AKBZMCY0A80HTKZ59D4P");
    //     $response = $polygon->stocks()->getSnapshot('DWT');

    //     print_r($response);

    //     // $this->assertEquals('DWT', ($response['symbol'] ?? ''));
    // }

    // public function testGetNews()
    // {
    //     $polygon = new Polygon("AKBZMCY0A80HTKZ59D4P");
    //     $response = $polygon->stocks()->getNews('DWT', 1, 20);

    //     print_r($response);

    // }
}
