<?php

require "counter.inc.php";

$message = "YEAH";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);
$ip=$_SERVER['REMOTE_ADDR'];
$name = gethostbyaddr($ip);

$machine = $ip . " " . $name;
// Send
mail('imparato.andrea@gmail.com', 'accesso effettuato!', $machine);

//istanziamo la classe

$page_counter = new COUNTER();



  



?>
