<?php
function createHomePage($text, $media, $gameNames){

  if ($gameNames[0][0] == $gameNames[0][1] && $gameNames[0][0] != '') {
    $nameUS = $gameNames[0][0].' (US/EU)<br />';
    $nameEU = '';
  } else {
    if (isset($gameNames[0][0]) && $gameNames[0][0] != '') {
      $nameUS = $gameNames[0][0].' (US)<br />';
    } else {
      $nameUS = '';
    }
    if (isset($gameNames[0][1]) && $gameNames[0][1] != '') {
      $nameEU = $gameNames[0][1].' (EU)<br />';
    } else {
      $nameEU = '';
    }
  }
  if (isset($gameNames[0][2]) && $gameNames[0][2] != '') {
    $nameJP = $gameNames[0][2].' (JP)<br />';
  } else {
    $nameJP = '';
  }
  $text = aposChanger($text);
  $content = '<div id="gpic">'.$media.'<div id="stitle" class = "center">Game Names</div><div id="game_titles">'.$nameJP.$nameUS.$nameEU.'</div></div>'.$text;
  return $content;
}

function gamePlayCompiler($gameInfo){
  for ($i=0; $i < 30; $i++) {
    $gp[$i] = $gameInfo[$i][0][0];
    $gpn[$i] = $gameInfo[$i][0][1];
  }

  $content = '<table>';
  $media = '';
  $titles = '';
  for ($i=0; $i < 30; $i++) {
    $media .= '<td class = "center"><br>'.$gp[$i].'</td>';
    $titles .= '<td class = "center"><b>'.aposChanger($gpn[$i]).'</b></td>';

    if (!(($i+1) % 3)) {
      $content .= '<tr>'.$media.'</tr>'.'<tr>'.$titles.'</tr>';
      $media = '';
      $titles = '';
      if (!isset($gpn[$i]) || $gp[$i] == '') {
        break;
      }
    }

  }
  $content .= '</table>';
  return $content;
}

function cutScenesCompiler($gameInfo, $gameMapInfo) {
  $content = aposChanger($gameMapInfo[5]).'<table cellspacing="13" cellpadding="2" class="border_none" width="100%">';
  for ($i=0; $i < 35; $i++) {
    if (!isset($gameInfo[$i][0][0]) || $gameInfo[$i][0][0] == '') {
      break;
    }
    $content .= '<tr><th>'.aposChanger($gameInfo[$i][0][1]).'</th></tr><tr><td>'.$gameInfo[$i][0][0].'</td><td>'.aposChanger($gameInfo[$i][0][2]).'</td></tr>';
  }
  $content .= '</table>';
  return $content;
}


function abilityCompiler($gameInfo){

  $content = '<table cellspacing="2" cellpadding="8" class="border_none" width="100%" id="TBBG" class = "center"><tr><th>Name/Images</th><th>In Game Description</th></tr>';
  $i = 0;
  while (isset($gameInfo[$i][0][2]) && $gameInfo[$i][0][2] != '') {
    $content .= '<tr class="alt"><th>'.aposChanger($gameInfo[$i][0][1]).'</th></tr><tr><td>'.$gameInfo[$i][0][0].'</td><td>'.aposChanger($gameInfo[$i][0][2]).'</td></tr>';
    $i++;
  }
  $content .= '</table>';
  return $content;
}

function bossCompiler($gameInfo) {
  $content = '<h1 class="center">Mini Bosses</h1><table cellspacing="2" cellpadding="8" class="border_none" width="100%" id="TBBG"><tr><th>Name/Images</th><th>In Game Description</th></tr>';

  $i = 0;
  while ($gameInfo[mb][$i][0][2] != '' && $gameInfo[mb][$i][0][2] != NULL) {
    $diff = '';
    if ($gameInfo[mb][$i][0][3] % 2) {
      $Fstars = ($gameInfo[mb][$i][0][3] - 1) / 2;
      $Estars = 9 - $Fstars;
      for ($j=0; $j < $Fstars; $j++) {
        $diff .= '<img src="/images/stars/warp_star1.png" width="24" height="22"  class="border_none">';
      }
      $diff .= '<img src="/images/stars/warp_star2.png" width="24" height="22"  class="border_none">';
      for ($j=0; $j < $Estars; $j++) {
        $diff .= '<img src="/images/stars/warp_star3.png" width="24" height="22"  class="border_none">';
      }
    } else {
      $Fstars = $gameInfo[mb][$i][0][3] / 2;
      $Estars = 10 - $Fstars;
      for ($j=0; $j < $Fstars; $j++) {
        $diff .= '<img src="/images/stars/warp_star1.png" width="24" height="22"  class="border_none">';
      }
      for ($j=0; $j < $Estars; $j++) {
        $diff .= '<img src="/images/stars/warp_star3.png" width="24" height="22"  class="border_none">';
      }
    }
    $content .= '<tr class="alt"><td class ="center"><div id="boss">'.aposChanger($gameInfo[mb][$i][0][0]).'</div><br>'.$gameInfo[mb][$i][0][1].'</td><td><b>Ability: </b>'.aposChanger($gameInfo[mb][$i][0][4]).'<br><b>Advice: </b>'.aposChanger($gameInfo[mb][$i][0][2]).'<br /><b>Difficulty:</b>'.$diff.'</td></tr>';

    $i++;
    }

  $content .= '</table><br /><br /><h1 class="center">Bosses</h1><table cellspacing="2" cellpadding="8" class="border_none" width="100%" id="TBBG"><tr><th>Name/Images</th><th>In Game Description</th></tr>';
  $count = count($gameInfo[b][0][0]);

  $i = 0;
  while ($gameInfo[b][$i][0][2] != '' && $gameInfo[b][$i][0][2] != NULL) {
    $diff = '';
    if ($gameInfo[b][$i][0][3] % 2) {
      $Fstars = ($gameInfo[b][$i][0][3] - 1) / 2;
      $Estars = 9 - $Fstars;
      for ($j=0; $j < $Fstars; $j++) {
        $diff .= '<img src="/images/stars/warp_star1.png" width="24" height="22"  class="border_none">';
      }
      $diff .= '<img src="/images/stars/warp_star2.png" width="24" height="22"  class="border_none">';
      for ($j=0; $j < $Estars; $j++) {
        $diff .= '<img src="/images/stars/warp_star3.png" width="24" height="22"  class="border_none">';
      }
    } else {
      $Fstars = $gameInfo[b][$i][0][3] / 2;
      $Estars = 10 - $Fstars;
      for ($j=0; $j < $Fstars; $j++) {
        $diff .= '<img src="/images/stars/warp_star1.png" width="24" height="22"  class="border_none">';
      }
      for ($j=0; $j < $Estars; $j++) {
        $diff .= '<img src="/images/stars/warp_star3.png" width="24" height="22"  class="border_none">';
      }
    }
    $content .= '<tr class="alt"><td class ="center"><div id="boss">'.aposChanger($gameInfo[b][$i][0][0]).'</div><br>'.$gameInfo[b][$i][0][1].'</td><td><b>Advice: </b>'.aposChanger($gameInfo[b][$i][0][2]).'<br /><b>Difficulty:</b>'.$diff.'</td></tr>';
    $i++;
    }
  $content .= '</table><br />';


  return $content;
}

function collectCompiler($gameInfo, $gameMapInfo) {
  $content = '<p>'.aposChanger($gameMapInfo[5]).'</p><br />';
  $i = 0;
  while (isset($gameInfo[$i][0][0]) && $gameInfo[$i][0][0] != '') {
    $content .= '<h3>'.aposChanger($gameInfo[$i][0][1]).'</h3>'.aposChanger($gameInfo[$i][0][0]).$gameInfo[$i][0][2].'<br /><br />';
    $i++;
  }
  return $content;
}

function collectAdvCompiler($gameInfo, $gameMapInfo) {
  $areaCount = count($gameInfo[area]) - 1;
  $miniMenu = '';
    if ($areaCount >= 1) {
      $miniMenu .= '<a href="#1">'.$gameInfo[area][1][0][0].'</a>';
    }
    if ($areaCount >= 2) {
      $miniMenu .= ' | <a href="#2">'.$gameInfo[area][2][0][0].'</a>';
    }
    if ($areaCount >= 3 && $areaCount != 4) {
      $miniMenu .= ' | <a href="#3">'.$gameInfo[area][3][0][0].'</a>';
    }
    if ($areaCount >= 5) {
      $miniMenu .= '<br /><a href="#4">'.$gameInfo[area][4][0][0].'</a> | <a href="#5">'.$gameInfo[area][5][0][0].'</a>';
    }
    if ($areaCount >= 6) {
      $miniMenu .= ' | <a href="#6">'.$gameInfo[area][6][0][0].'</a>';
    }
    if ($areaCount >= 7) {
      $miniMenu .= '<br /><a href="#7">'.$gameInfo[area][7][0][0].'</a>';
    }
    if ($areaCount >= 8) {
      $miniMenu .= ' | <a href="#8">'.$gameInfo[area][8][0][0].'</a>';
    }
    if ($areaCount >= 9) {
      $miniMenu .= ' | <a href="#9">'.$gameInfo[area][9][0][0].'</a>';
    }
    if ($areaCount == 4) {
      $miniMenu .= '<br /><a href="#3">'.$gameInfo[area][3][0][0].'</a> | <a href="#4">'.$gameInfo[area][4][0][0].'</a>';
    }
  $content = '<div class = "center">'.aposChanger($gameMapInfo[5]).'</div><br /><br /><div class = "center">'.$miniMenu.'</div><br /><br /><table cellspacing="2" cellpadding="2" class="border_none" width="100%" class = "center">';
  $k = 1;

  while (isset($gameInfo[area][$k][0][0]) && $gameInfo[area][$k][0][0] != '') {
    if($k != 1){$br = '<br /><br /><br /><br />';}
    $content .= '<tr><th colspan="2" class="center">'.$br.'<h1><a id="'.$k.'">'.$gameInfo[area][$k][0][0].'</a></h1></th></tr>';

    $j = 1;
    while (isset($gameInfo[stage][$k][$j][0][0]) && $gameInfo[stage][$k][$j][0][0] != '') {
      $content .= '<tr><th class = "center"><h2>'.$gameInfo[stage][$k][$j][0][0].'<font size="-5"> <a href="#top">to top</a></font></h2></th></tr>';

      $i = 0;
      while (isset($gameInfo[$k][$j][$i][0][0]) && $gameInfo[$k][$j][$i][0][0] != '') {
        $content .= '<tr><td>'.$gameInfo[$k][$j][$i][0][2].'</td><td><b><h3>'.aposChanger($gameInfo[$k][$j][$i][0][1]).'</h3></b><p>'.aposChanger($gameInfo[$k][$j][$i][0][0]).'</p></td></tr>';
        $i++;
      }
      $j++;
    }
    $k++;
  }
  $content .= '</table>';

  return $content;
}

function otherCompiler($gameInfo, $gameMapInfo) {
  $content = aposChanger($gameMapInfo[5]).aposChanger($gameInfo);
  return $content;
}


function aposChanger($text){
   $text = str_replace("'", "&#39;", $text, $count); //apostrophe mark
   return $text;
 }
