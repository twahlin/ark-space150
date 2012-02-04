<!DOCTYPE html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>

    <link rel="stylesheet" href="public/styles/style.css" type="text/css" />
    <link rel="Shortcut Icon" href="public/images/favicon.ico" type="image/x-icon" />

    <script src="public/scripts/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/scripts/scripts.js" type="text/javascript" charset="utf-8"></script>	
</head>

<body>

  <?php
  require_once 'public/scripts/magpie/rss_fetch.inc';

  $url = 'http://feeds.feedburner.com/railscasts';
  $rss = fetch_rss($url);

  echo "Site: ", $rss->channel['title'], "<br>
  ";
  foreach ($rss->items as $item ) {
  	$title = $item[title];
  	$url   = $item[link];
  	echo "<a href=$url>$title</a></li><br>
  ";
  }
  ?>

  Other stuffs

  <?php

  $url = 'http://ws.audioscrobbler.com/1.0/user/twahlin/recenttracks.rss';
  $rss = fetch_rss($url);

  echo "Site: ", $rss->channel['title'], "<br>
  ";
  $i = 0; //yo
  foreach ($rss->items as $item ) {
  	$title = $item[title];
  	$url   = $item[link];
  	echo "<a href=$url>$title</a></li><br>
  ";
  if (++$i == 2) break; //yo
  }
  ?>

</body>
</html>