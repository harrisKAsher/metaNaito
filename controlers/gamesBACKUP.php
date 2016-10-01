<?php
$runSwitch = substr($action, 1, 3);
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
switch ($runSwitch) {
  case 'ADV':
    include('controlers/games/adventure.php');
    break;

  case 'AIR':
    include('controlers/games/air.php');
    break;

  case 'AVA':
    include('controlers/games/avalanche.php');
    break;

  case 'BLO':
    include('controlers/games/block.php');
    break;

  case 'CAN':
    include('controlers/games/canvas.php');
    break;

  case 'COL':
    include('controlers/games/collection.php');
    break;

  case 'COU':
    include('controlers/games/course.php');
    break;

  case 'CRY':
    include('controlers/games/crystal.php');
    break;

  case 'DL1':
    include('controlers/games/dream.php');
    break;

  case 'DL2':
    include('controlers/games/dream2.php');
    break;

  case 'DL3':
    include('controlers/games/dream3.php');
    break;

  case 'MAS':
    include('controlers/games/mass.php');
    break;

  case 'MIR':
    include('controlers/games/mirror.php');
    break;

  case 'NIG':
    include('controlers/games/nightmare.php');
    break;

  case 'PIN':
    include('controlers/games/pinball.php');
    break;

  case 'RAI':
    include('controlers/games/rainbow.php');
    break;

  case 'RET':
    include('controlers/games/return.php');
    break;

  case 'ROB':
    include('controlers/games/robobot.php');
    break;

  case 'SQU':
    include('controlers/games/squeak.php');
    break;

  case 'SUP':
    include('controlers/games/super_star.php');
    break;

  case 'STA':
    include('controlers/games/star_stacker.php');
    break;

  case 'TIL':
    include('controlers/games/tilt.php');
    break;

  case 'TRI':
    include('controlers/games/triple.php');
    break;

  case 'ULT':
    include('controlers/games/ultra.php');
    break;

  case 'YAR':
    include('controlers/games/yarn.php');
    break;

  default:
    $posts = displayPosts();
    include 'views/home.php';
    break;

}
