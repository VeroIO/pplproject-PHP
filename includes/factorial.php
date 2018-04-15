<?php
$queue  = 'factorial_number';
$msg    = $_POST['factorial'];

try {
    $stomp = new Stomp('tcp://localhost:6161');
    while (true) {
      $stomp->send($queue, $msg);
      sleep(1);
    }
} catch(StompException $e) {
    die('Connection error: '.$e));
}
?>