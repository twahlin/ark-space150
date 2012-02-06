<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>

    <link rel="stylesheet" href="public/styles/style.css" type="text/css" />
    <link rel="Shortcut Icon" href="public/images/favicon.ico" type="image/x-icon" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/scripts/scripts.js" type="text/javascript" charset="utf-8"></script>	
    
    
    <script>
  	$(function() {
  		$( "#tabs" ).tabs();
  	});
  	</script>
    
</head>

<body>
  <div class="wrapper">

  <?php
  require_once 'public/scripts/magpie/rss_fetch.inc';
  ?>

  <?php

  $url = 'http://ws.audioscrobbler.com/1.0/user/twahlin/recenttracks.rss';
  $rss = fetch_rss($url);

  $i = 0; //yo
  foreach ($rss->items as $item ) {
  	$title = $item[title];
  	$url   = $item[link];
  	echo "<p>$title</p>";
  if (++$i == 2) break; //yo
  }
  ?>
  
  
  <?php

  $url = 'http://dribbble.com/twahlin/shots.rss';
  $rss = fetch_rss($url);

  $i = 0; //yo
  foreach ($rss->items as $item ) {
  	$title = $item[title];
  	$description = $item[description];
  	echo "<p>$title</p><p>$description</p>";
  if (++$i == 2) break; //yo
  }
  ?>
  
  <?php

  $url = 'http://dribbble.com/billyfrench/shots.rss';
  $rss = fetch_rss($url);

  $i = 0; //yo
  foreach ($rss->items as $item ) {
  	$title = $item[title];
  	$description = $item[description];
  	echo "<p>$title</p><p>$description</p>";
  if (++$i == 2) break; //yo
  }
  ?>
  
  
  <div class="pixels"></div>
  
  
  <div class="video_room">
    <li><iframe src="http://player.vimeo.com/video/21965821?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a href="http://vimeo.com/21965821">Tycho live visuals test footage</a> from <a href="http://vimeo.com/iso50">ISO50</a> on <a href="http://vimeo.com">Vimeo</a>.</p></li>
    <li><iframe src="http://player.vimeo.com/video/36167539?color=ff9933" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><p><a href="http://vimeo.com/36167539">M.I.A, Bad Girls</a> from <a href="http://vimeo.com/gavras">ROMAIN-GAVRAS</a> on <a href="http://vimeo.com">Vimeo</a>.</p></li>
  </div>  
  
  
  
<div class="tab_test">
  <ul>
    <li>Tab Nav 1</li>
  </ul>
</div>
  
  
  <div class="shadow-test"><div class="room-light"></div></div>
  <div class="light-switch light-switch-off"></div>


<div class="album-art">
  <div class="album-art-img"></div>
</div>


</div>

<script>
$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
  {
    tags: "bulldog",
    tagmode: "any",
    format: "json"
  },
  function(data) {
    $.each(data.items, function(i,item){
      $("<img/>").attr("src", item.media.m).appendTo("#images");
      if ( i == 3 ) return false;
    });
  });</script>
    <div id="images"></div>
    
    
    
    
    
    
    
    <script>
    
    
    
    $(document).ready(function() {
      // Declare variables to hold twitter API url and user name
      var twitter_api_url = 'http://search.twitter.com/search.json';
      var twitter_user    = 'twahlin';

      // Enable caching
      $.ajaxSetup({ cache: true });

      // Send JSON request
      // The returned JSON object will have a property called "results" where we find
      // a list of the tweets matching our request query
      $.getJSON(
        twitter_api_url + '?callback=?&rpp=5&q=from:' + twitter_user,
        function(data) {
          $.each(data.results, function(i, tweet) {
            // Uncomment line below to show tweet data in Fire Bug console
            // Very helpful to find out what is available in the tweet objects
            //console.log(tweet);

            // Before we continue we check that we got data
            if(tweet.text !== undefined) {
              // Calculate how many hours ago was the tweet posted
              var date_tweet = new Date(tweet.created_at);
              var date_now   = new Date();
              var date_diff  = date_now - date_tweet;
              var hours      = Math.round(date_diff/(1000*60*60));

              // Build the html string for the current tweet
              var tweet_html = '<div class="tweet_text">';
              tweet_html    += '<a href="http://www.twitter.com/';
              tweet_html    += twitter_user + '/status/' + tweet.id + '">';
              tweet_html    += tweet.text + '<\/a><\/div>';
              tweet_html    += '<div class="tweet_hours">' + hours;
              tweet_html    += ' hours ago<\/div>';

              // Append html string to tweet_container div
              $('#tweet_container').append(tweet_html);
            }
          });
        }
      );
    });
  </script>
      <div id="tweet_container"></div>
      
      
      
      
      
      
      <script>
      
      var username='twahlin'; // set user name
      var format='json'; // set format, you really don't have an option on this one
      var url='http://api.twitter.com/1/statuses/user_timeline/'+username+'.'+format+'?callback=?'; // make the url

      	$.getJSON(url,function(tweet){ // get the tweets
      		$("#last-tweet").html(tweet[0].text); // get the first tweet in the response and place it inside the div
      	});
      	
      </script>
      <div id="last-tweet"></div>
      
      
      
      
      <script>
      
      var arr = [ "one", "two", "three", "four", "five" ];
      
       jQuery.each(arr, function() {
         $("#" + this).text("Mine is " + this + ".");
          return (this != "three"); // will stop running after "three"
      });
      
      </script>
    
    
    
    








</body>
</html>