<?php
$runSwitch = substr($action, 4, strlen($action));
$game = "COL";
switch ($runSwitch) {

  case 'game_play':
    $type = 'Game_Play';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'challenge':
    $type = 'Other1';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'games':
  $type = 'Other2';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'history':
    $type = 'Other3';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;


    //OVERVIEW PAGE
  default:
    $type = 'Home';
    $gameMapInfo = getMap($game, $type);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description
    $gameNames = getGameNames($gameMapInfo[1]);
    $gameInfo = getHomePage($gameMapInfo[0]);
    $content = createHomePage($gameInfo[0][0], $gameInfo[0][1], $gameNames);
    include('views/game.php');
    break;

}
