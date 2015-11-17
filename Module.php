<?php
namespace ZendTwitterApi;

use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

/**
 * Bootstraps the module.
 */
class Module implements AutoloaderProviderInterface, ServiceProviderInterface
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\ModuleManager\Feature\AutoloaderProviderInterface::getAutoloaderConfig()
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Zend\ModuleManager\Feature\ServiceProviderInterface::getServiceConfig()
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                'ZendTwitterApiOptions' => function ($sm) {
                    $config = $sm->get('config');
                    
                    return new \ZendTwitterApi\Options\Options((isset($config['zend-twitter-api'])) ? $config['zend-twitter-api'] : []);
                },
                'ZendTwitterApi' => function ($sm) {
                    $options = $sm->get('ZendTwitterApiOptions'); /* @var $options \ZendTwitterApi\Options\Options */
                    
                    $settings = [
                        'oauth_access_token' => $options->getOAuthAccessToken(),
                        'oauth_access_token_secret' => $options->getOAuthAccessTokenSecret(),
                        'consumer_key' => $options->getConsumerKey(),
                        'consumer_secret' => $options->getConsumerSecret()
                    ];
                    
                    return new \TwitterAPIExchange($settings);
                }
            ]
        ];
    }
}
