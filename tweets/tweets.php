<?php 
	include_once ("../vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php");

	/**
	* 
	*/

	$settings = array(
	    'oauth_access_token' => "397885595-lR6Et1C4nHnCtUpjyxACeZIOCucvYpkHlRzwE6I1",
	    'oauth_access_token_secret' => "YH41l7iw1gK3bG1EO1e4mdyyEoVE1n4IvOKuaQuZ8",
	    'consumer_key' => "4ARITbEDl45ebVItEAdTXA",
	    'consumer_secret' => "ZtOfXYOSVwjXTkEwARHMU2lRIzMW7JPlEGxjE5u5M"
	);
	
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	$requestMethod = 'GET';
	$getfield = '?geocode='.$_GET['lat'].','.$_GET['lng'].',1mi&count=20';
	$twitter = new TwitterAPIExchange($settings);

	echo $twitter->setGetfield($getfield)
			    ->buildOauth($url, $requestMethod)
			    ->performRequest();
	
?>