<?php
namespace ZendTwitterApi\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Stores the config for this module bundled as object.
 */
class Options extends AbstractOptions
{

    protected $oauth_access_token;

    protected $oauth_access_token_secret;

    protected $consumer_key;

    protected $consumer_secret;

    public function getOAuthAccessToken()
    {
        return $this->oauth_access_token;
    }

    public function getOAuthAccessTokenSecret()
    {
        return $this->oauth_access_token_secret;
    }

    public function getConsumerKey()
    {
        return $this->consumer_key;
    }

    public function getConsumerSecret()
    {
        return $this->consumer_secret;
    }

    public function setOAuthAccessToken($token)
    {
        $this->oauth_access_token = $token;
        return $this;
    }

    public function setOAuthAccessTokenSecret($secret)
    {
        $this->oauth_access_token_secret = $secret;
        return $this;
    }

    public function setConsumerKey($key)
    {
        $this->consumer_key = $key;
        return $this;
    }

    public function setConsumerSecret($secret)
    {
        $this->consumer_secret = $secret;
        return $this;
    }
}