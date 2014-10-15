<?php

	//inclue code bird to do the oauth lifting for us
	require_once('cb/codebird.php');

	//store keys/tokens/secrets provided by Twitter
	$CONSUMER_KEY = 'L2MGbFUJ0Wuuovd6uI4Ow';
	$CONSUMER_SECRET = 'sHVzOKmJdYeW8XeuO8hNZZ1ObOi6XSGI1iU8lcY4';
	$ACCESS_TOKEN = '35382612-vHZ8ujNgIICRFAhuSsu7ILvPuU1XQyWL0GzpcZiZg';
	$ACCESS_TOKEN_SECRET = 'c0pviC5B01gDO11zfg0s0z91E58PrqCBvt56M4tA4gdM1';

	//Get authenticated
	\Codebird\Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
	$cb = \Codebird\Codebird::getInstance();
	$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);

	$reply = $cb->oauth2_token();

	if (!isset($bearer_token)){
		$bearer_token = $reply->access_token;
	}

	//app authentication
	\Codebird\Codebird::setBearerToken($bearer_token);

		//variables
		$tag = $_GET['tag'];

		//Create query
		$params = array(
			'q' => $tag,
			'count' => 100
		);

			//retrieve posts
			$api = "search_tweets";

			//Make the REST call
			$twitterRes = (array) $cb->$api($params);

			//convert results to an associative array
			$twitterData = json_decode(json_encode($twitterRes), true);

			//Optionally, store results in a file
			file_put_contents("twitter.json", json_encode($twitterRes));


	//Output result

	$data = $twitterData['statuses'];

	if(!empty($data)){
		//display the profile data
		echo "<div class='post'>";
			//echo "<section class='post'>";
				//echo "<header class='post-header'>";
					//parse the url for full image of profile
					//$profilePicture = $data['0']['user']['profile_image_url'];
					//$profilePicture = str_replace("_normal", "", $profilePicture);
					//echo "<img src=\"".$profilePicture."\"/>"; //getting the profile image
					//echo "<br/>";
					//echo "Name: ".$data['0']['user']['name']."<br/>"; //getting the username
					//echo "Web: <a href='".$data['0']['user']['url']."'>".$data['0']['user']['url']."</a><br/>"; //getting the web site address
					//echo "Location: ".$data['0']['user']['location']."<br/>"; //user location
					//echo "Updates: ".$data['0']['user']['statuses_count']."<br/>"; //number of updates
					//echo "Follower: ".$data['0']['user']['followers_count']."<br/>"; //number of followers
					//echo "Following: ".$data['0']['user']['friends_count']."<br/>"; // following
					//echo "Description: ".$data['0']['user']['description']."<br/>"; //user description
				//echo "</header>";
			//echo "</section>";

		//display tweets under
		foreach ($data as $item){
			echo "<section class='post'>";
				echo "<div class='post-description'>";
				echo $item['text'];
				if(!empty($item['entities']['media']['0']['media_url'])){
					echo "<img src=\"".$item['entities']['media']['0']['media_url']."\" width=\"200\" height=\"200\"/>"; //getting the media image
				}
				echo "</div>";
				echo "<p class='post-meta'>";
				echo "<em>".$item['created_at']."</em>";
				echo "</p>";
				echo '<br/>';
			echo '</p>';
			echo '<br/>';
		}

		echo "</div>";
	}
?>
