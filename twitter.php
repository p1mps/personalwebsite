<?php
function getTwitterStatus($twitterUser, $howMany = 1) {
  $url = sprintf("http://twitter.com/statuses/user_timeline/%s.xml?count=%d",
      $twitterUser, $howMany);
  $parsed = new SimpleXMLElement(file_get_contents($url));

  $tweets = array();
  foreach($parsed->status as $status) {
    $message = preg_replace("/http:\/\/(.*?)\/[^ ]*/", '<a href="\\0">\\0</a>',
        $status->text);
    $time = niceTime(strtotime(str_replace("+0000", "", $status->created_at)));
    $tweets[] = array('message' => $message, 'time' => $time);
  }
  return $tweets;
}


function niceTime($time) {
  $delta = time() - $time;
  if ($delta < 60) {
    return 'less than a minute ago.';
  } else if ($delta < 120) {
    return 'about a minute ago.';
  } else if ($delta < (45 * 60)) {
    return floor($delta / 60) . ' minutes ago.';
  } else if ($delta < (90 * 60)) {
    return 'about an hour ago.';
  } else if ($delta < (24 * 60 * 60)) {
    return 'about ' . floor($delta / 3600) . ' hours ago.';
  } else if ($delta < (48 * 60 * 60)) {
    return '1 day ago.';
  } else {
    return floor($delta / 86400) . ' days ago.';
  }
}
?>
