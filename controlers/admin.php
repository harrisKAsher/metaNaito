<?php
$runSwitch = substr($action, 1, 3);
/*
  LOG - login stuff
  HOM - Homepage and Archive stuff
  GAM - Game Stuff
*/
switch ($runSwitch) {
  case 'LOG':
    include('controlers/admin/log.php');
    break;

  case 'HOM':
    include('controlers/admin/hom.php');
    break;

  case 'GAM':
    include('controlers/admin/gam.php');
    break;

  default:
    $posts = displayPosts();
    include '/views/home.php';
    break;
}
