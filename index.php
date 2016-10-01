<?php
session_start();
require('models/database.php');
require('models/model.php');
require('models/post.php');
require('models/functions.php');


if (!isset($_SESSION['loggedin'])) {
  $_SESSION['loggedin'] = FALSE;
}

/*
  G - games
  I - info
  F - fanart
  C - contact
  A - admin
*/
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  $error = filter_input(INPUT_GET, 'error');
}
$runSwitch = substr($action, 0, 1);
switch ($runSwitch) {
  case 'G':
    include('controlers/games.php');
    break;

  case 'F':
    include('controlers/fanart.php');
    break;

  case 'I':
    include('controlers/info.php');
    break;

  case 'A':
    include('controlers/admin.php');
    break;

  default:
  $posts = displayPosts();
    include 'views/home.php';
    break;

}

//
