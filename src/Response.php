<?php namespace Polygon;

class Response
{
    /**
     * Polygon access
     *
     * @return Polygon
     */
    private $polygon;

    /**
     * Guzzle Request
     *
     * @return GuzzleHttp\Psr7\Response
     */
    private $request;

    /**
     * Start the class()
     *
     */
    public function __construct(Polygon $polygon, \GuzzleHttp\Psr7\Response $request)
    {
        $this->polygon = $polygon;

        $this->request = $request;
    }

    /**
     * contents()
     *
     * get contents
     *
     */
    public function contents() {
        return json_decode($this->request->getBody()->getContents(),true);
    }
}
