<?php
/*
  ADV - adventure
  AIR - air ride
  AVA - avalanche
  BLO - block
  CAN - canvas
  COL - dream collection
  COU - course (dream)
  CRY - Crystal (64)
  DL1 - Dreamland
  DL2 - Dreamland 2
  DL3 - Dreamland 3
  MAS - Mass Attack
  MIR - mirror
  NIG - nightmare
  PIN - pinball
  RAI - rainbow
  RET - returns
  ROB - robobot
  SQU - squeak
  SUP - super star
  STA - star stacker
  TIL - tilt
  TRI - triple
  ULT - ultra
  YAR - Yarn
*/
$caseEnd = (strlen($action) - 1);
$runSwitch = substr($action, 4, $caseEnd - 4);
$subType = substr($action, $caseEnd, 1);
$game = substr($action, 1, 3);
switch ($runSwitch) {

    //OVERVIEW PAGE
  case 'home':
    $type = 'Home';
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description
    $gameNames = getGameNames($gameMapInfo[1]);
    $gameInfo = getHomePage($gameMapInfo[0]);
    $content = createHomePage($gameInfo[0][0], $gameInfo[0][1], $gameNames);
    include('views/game.php');
    break;

  case 'game_play':
    $type = 'Game_Play';
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description
    $gameInfo = getGamePlayPage($gameMapInfo[0]);
    $content = gamePlayCompiler($gameInfo);
    include('views/game.php');
    break;

  case 'scenes':
    $type = 'Cut_Scenes';
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description, sub_type?
    $gameInfo = getCutScenesPage($gameMapInfo[0]);
    $content = cutScenesCompiler($gameInfo, $gameMapInfo);
    include('views/game.php');
    break;

  case 'copy':
    $type = 'Copy_Abilities';
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description, sub_type?
    $gameInfo = getAbilityPage($gameMapInfo[0]);
    $content = abilityCompiler($gameInfo);
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
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description, sub_type?
    $gameInfo = getBossPage($gameMapInfo[0], 0, 1); // 0 is normal Miniboss, 1 is Normal Boss, 2 is EX miniboss, 3 is EX boss
    $content = bossCompiler($gameInfo); // mb and b --> name, image, advice, difficulty, ability (no ability in b)
    include('views/game.php');
    break;

  case 'sub':
    $type = 'Sub_Games';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'arena':
    $type = 'Arenas';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'collectable':
    $type = 'Collectables_Locations';
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description, sub_type?
    $gameInfo = getCollectPage($gameMapInfo[0]);
    $content = collectCompiler($gameInfo, $gameMapInfo);
    include('views/game.php');
    break;

  case 'advCollectable':
    $type = 'Collectables_Locations_Advanced';
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description, sub_type?
    $gameInfo = getCollectAdvPage($gameMapInfo[0]);
    //print_r($gameInfo);
    //break;
    $content = collectAdvCompiler($gameInfo, $gameMapInfo);
    include('views/game.php');
    break;


  case 'hal':
    $type = 'HAL_Rooms';
    $content = getPage($game, $type);
    $content = aposChanger($content);
    include('views/game.php');
    break;

  case 'other':
    $type = 'Other';
    $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description, sub_type
    $gameInfo = getOtherPage($gameMapInfo[0]);
    $content = OtherCompiler($gameInfo, $gameMapInfo);
    include('views/game.php');
    break;

    default:
      $type = 'Home';
      $gameMapInfo = getMap($game, $type, $subType);  // game_map_id, game_id, game_type_id, game_name, page_name, page_description
      $gameNames = getGameNames($gameMapInfo[1]);
      $gameInfo = getHomePage($gameMapInfo[0]);
      $content = createHomePage($gameInfo[0][0], $gameInfo[0][1], $gameNames);
      include('views/game.php');
      break;
}
