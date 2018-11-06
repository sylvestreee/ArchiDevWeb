<?php

$url = $_GET['url'];
$file = basename($url);

require 'global/header.html';

switch($file) {
  case "home" :
    require 'controllers/home.html';
    break;
  case "catalogue" :
    require 'controllers/catalogue.html';
    break;
  case "log" :
    require 'controllers/log.html';
    break;
  case "sign" :
    require 'controllers/sign.html';
    break;
  default :
    break;
}

require 'global/footer.html';

>
