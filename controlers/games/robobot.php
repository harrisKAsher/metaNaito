<?php
$runSwitch = substr($action, 4, strlen($action));
$game = "ROB";
switch ($runSwitch) {

  case 'game_play':
    $type = 'Game_Play';
    $gameMapInfo = getMap($game, $type);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description
    $gameInfo = getGamePlayPage($gameMapInfo[0]);
    $content = gamePlayCompiler($gameInfo);
    include('views/game.php');
    break;

  case 'scenes':
$type = 'Cut_Scenes';
    $type = 'Cut_Scenes';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'enemy':
  $type = 'Enemies';
    $type = 'Enemies';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'boss':
  $type = 'Boss_Guide';
    $type = 'Boss_Guide';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'sub':
  $type = 'Sub_Games';
    $type = 'Sub_Games';
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
