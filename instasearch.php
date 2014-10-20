<?php
  header('Content-type: application/json');

  $CLIENT_ID = '332c1744fa094a458368bff138f07d6a';
  $CLIENT_SECRET = 'c1f8b69281fc4dceba14b3754d21df64';

  $tag = $_GET['tag'];

  $api = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$CLIENT_ID;

  function get_curl($url) {
    if(function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        echo curl_error($ch);
        curl_close($ch);
        return $output;
    } else{
        return file_get_contents($url);
    }
  }

  //getting response
  $response = get_curl($api);
  $results = json_decode($response, true);

  //Optionally, store results in a file
  file_put_contents("insta.json", json_encode($response));

  //Now parse through the $results array to display your results...
  if(!empty($results)){
    foreach($results['data'] as $item){
        echo "<div class = 'item'>";
        $image_link = $item['images']['thumbnail']['url'];
        echo '<img src="'.$image_link.'" />';
        // $caption = $item['caption']['text'];
        // echo '<p>'.$caption.'</p>';
        echo "</div>";
    }
  }else{
    echo "No Results!";
  }
?>
