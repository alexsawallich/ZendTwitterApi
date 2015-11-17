# Introduction
*ZendTwitterApi* is a very simple Zend-Framework 2-Module, which wraps [J7mbo's PHP Twitter API](https://github.com/J7mbo/twitter-api-php).
*ZendTwitterApi* provides a service which can be retrieved from the `ServiceManager`. 'OAuth'-Tokens, -secrets and so on, can be specified
in your config-file.

This means, that this module itself doesn't do anything. It's up to you to build modules using this API.

# Installation
Installation can be done through composer.

Just add

    "alexsawallich/zend-twitter-api": "dev-master"

to your application's `composer.json` and execute `php composer.phar update`.

Then copy `vendor/alexsawallich/zend-twitter-api/config/zend-twitter-api.global.php.dist` from to `./autoload/zend-twitter-api.global.php`. Open
the copied file and set the options, according to your twitter-application.

If you don't have a twitter-application yet, you can register one for free here: [Twitter Application Management](https://apps.twitter.com/).

# Usage
Anywhere in your code, where you have access to the ServiceLocator you can do the following:

    $twitterApi = $this->getServiceLocator()->get('ZendTwitterApi');

## What to do now?
Check out the GitHub-page of [J7mbo's PHP Twitter API](https://github.com/J7mbo/twitter-api-php) to see what you can do with the API.

An example to get the 3 latest tweets for the user @alexsawallichde would be:

    $api = $this->getServiceLocator()->get('ZendTwitterApi');
	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = '?count=3&trim_user=1&exclude_replies=1&user_id=alexsawallichde';
    $latestTweets = $api->setGetfield($getfield)
                        ->buildOauth($url, 'GET')
                        ->performRequest();
	
	$json = json_decode($latestTweets);

A possible use-case would be to put something like the given example into a view-helper.
