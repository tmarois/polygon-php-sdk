<?php namespace Polygon;

use GuzzleHttp\Client;
use Polygon\Response;

class Request
{
    /**
     * Polygon access
     *
     * @return Polygon
     */
    private $polygon;

    /**
     * Guzzle Client
     *
     * @return GuzzleHttp\Client
     */
    private $client;

    /**
     * Start the class()
     *
     */
    public function __construct(Polygon $polygon)
    {
        $this->polygon = $polygon;

        $this->client = new Client([
            'base_uri' => $this->polygon->getRoot(),
            'timeout'  => 5.0
        ]);
    }

    /**
     * send()
     *
     * Send request
     *
     */
    public function send($handle, $segment = [], $params = [])
    {
        // build and prepare our full path rul
        $url = $this->prepareUrl($handle, $segment);

        // add the api key to all requests
        $params['apiKey'] = $this->polygon->getKey();        

        return (new Response($this->polygon, $this->client->request('GET', $url, [
            'query' => $params
        ])));
    }

    /**
     * prepareUrl()
     *
     * Get and prepare the url
     *
     * @return string
     */
    private function prepareUrl($handle, $segments = [])
    {
        $url = $this->polygon->getPath($handle);

        foreach($segments as $segment=>$value) {
            $url = str_replace('{'.$segment.'}', $value, $url);
        }

        return $url;
    }
}
