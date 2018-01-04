<?php

use GuzzleHttp\Client;

/**
 * A request handler for Tumblr authentication
 * and requests
 */
class TI_Request {
  private $baseUrl;

  /**
   * Instantiate a new RequestHandler
   */
  public function __construct()
  {
      $this->baseUrl = 'https://api.tumblr.com/v2/';
      $this->client = new Client(array(
          'base_uri' => $this->baseUrl,
          'allow_redirects' => false,
      ));
  }

  /**
     * Make a request with this request handler
     *
     * @param string $method  one of GET, POST
     * @param string $path    the path to hit
     * @param array  $options the array of params
     *
     * @return \stdClass response object
     */
    public function request($method, $path, $options)
    {
        // Ensure we have options
        $options = $options ?: array();
        $guzzleOptions = [
            // Swallow exceptions since \Tumblr\API\Client will handle them
            'http_errors' => false,
            'query' => $options,
            'verify' => false,
            'timeout' => 15
        ];
        $response = $this->client->request($method, $path, $guzzleOptions);
        // Construct the object that the Client expects to see, and return it
        $obj = new \stdClass;
        $obj->status = $response->getStatusCode();
        // Turn the stream into a string
        $obj->body = $response->getBody()->__toString();
        $obj->headers = $response->getHeaders();
        return $obj;
    }
}