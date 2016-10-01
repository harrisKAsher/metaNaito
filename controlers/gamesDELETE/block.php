<?php
$runSwitch = substr($action, 4, strlen($action));
$game = "BLO";
switch ($runSwitch) {

  case 'game_play':
    $type = 'Game_Play';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;


  case 'copy':
    $type = 'Copy_Abilities';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'enemy':
    $type = 'Enemies';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'boss':
    $type = 'Boss_Guide';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'levels':
    $type = 'other1';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

    //OVERVIEW PAGE
  default:
  $type = 'Home';
  $content = getPage($game, $type);
  $content = aposChanger($content);
  include('views/game.php');
    break;

}
