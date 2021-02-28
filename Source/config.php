<?php

require_once 'vendor/autoload.php';
if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '734655704098336',  
  'app_secret'     => 'f9fe34ec0bebb93ed298ea5c9024a759',
  'default_graph_version'  => 'v2.10'
]);

?>