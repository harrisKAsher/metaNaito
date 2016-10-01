<?php
$runSwitch = substr($action, 1, 3);
/*
  ART - art
  FIC - fiction
  VID - video
  MUS - music
*/
switch ($runSwitch) {
  case 'ART':
    include('controlers/fan_art/art.php');
    break;

  case 'FIC':
    include('controlers/fan_art/fiction.php');
    break;

  case 'VID':
    include('controlers/fan_art/video.php');
    break;

  case 'MUS':
    include('controlers/fan_art/music.php');
    break;

  default:
    include 'views/home.php';
    break;

}
