<?php

require_once TUMBLR_IMAGES_PLUGIN_DIRECTORY . 'includes/lib/tumblrImages-request.php';
require_once TUMBLR_IMAGES_PLUGIN_DIRECTORY . 'includes/lib/tumblrImages-exception.php';

class TI_Api {
	const API_ENDPOINT = 'https://api.tumblr.com/v2/';
	private $blogId;
  private $apiKey;
  private $requestHandler;

	public function __construct() {
		$this->blogId = TUMBLR_IMAGES_BLOG_ID;
    $this->apiKey = TUMBLR_IMAGES_API_KEY;
    $this->requestHandler = new TI_Request();
  }

  /**
   * Make a request to the given endpoint and return the response
   *
   * @param string $method    the method to call: GET, POST
   * @param string $path      the path to call on
   * @param array  $options   the options to call with
   * @param bool   $addApiKey whether or not to add the api key
   *
   * @return \stdClass the response object (not parsed)
   */
  private function makeRequest($method, $path, $options, $addApiKey)
  {
      if ($addApiKey) {
          $options = array_merge(
              array('api_key' => $this->apiKey),
              $options ?: array()
          );
      }
      return $this->requestHandler->request($method, $path, $options);
  }

  /**
   * Parse a response and return an appropriate result
   *
   * @param  \stdClass $response the response from the server
   *
   * @throws TI_Exception
   * @return array  the response data
   */
  private function parseResponse($response)
  {
      $response->json = json_decode($response->body);
      if ($response->status < 400) {
          return $response->json->response;
      } else {
          throw new TI_Exception($response);
      }
  }

  /**
   * Make a GET request to the given endpoint and return the response
   *
   * @param string $path      the path to call on
   * @param array  $options   the options to call with
   * @param bool   $addApiKey whether or not to add the api key
   *
   * @return array the response object (parsed)
   */
  private function getRequest($path, $options, $addApiKey)
  {
      $response = $this->makeRequest('GET', $path, $options, $addApiKey);
      return $this->parseResponse($response);
  }

  /**
   * Expand the given blogName into a base path for the blog
   *
   * @param string $blogName the name of the blog
   * @param string $ext      the url extension
   *
   * @return string the blog base path
   */
  private function blogPath($ext)
  {
      return "blog/" . $this->blogId . $ext;
  }

  /**
   * Get posts for a given blog
   *
   * @param string $blogName the name of the blog
   * @param array  $options  the options for the call
   *
   * @return array the response array
   */
  public function getBlogPosts($options = null)
  {
      $path = $this->blogPath('/posts');
      if ($options && isset($options['type'])) {
          $path .= '/' . $options['type'];
          unset($options['type']);
      }
      return $this->getRequest($path, $options, true);
  }

  /**
   * Get post images, title, and message for a given blog
   *
   * @param string $blogName the name of the blog
   * @param array  $options  the options for the call
   *
   * @return array the response array
   */
  public function getImagePosts()
  {
    $options = array(
      'type' => 'photo'
    );
    $response = $this->getBlogPosts($options);
    $posts = $response->posts;
    $data = array();

    if ($posts && ! empty( $posts ) ) :
        foreach($posts as $i => $post) :
            $post_img = $post->photos[0]->original_size->url;
            if ( ! empty( $post_img ) ) :
                $data[$i]['caption'] = $post->caption;
                $data[$i]['title'] = ucwords( str_replace( '-', ' ', $post->slug ) );
                $data[$i]['url'] = $post->photos[0]->original_size->url;
            endif;
        endforeach;
    endif;
    return $data;
  }
}