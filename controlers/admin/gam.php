<?php
$runSwitch = substr($action, 4, strlen($action));

$content = filter_input(INPUT_POST, 'content');
$gameMapID = filter_input(INPUT_POST, 'gameMapID');
$gameID = filter_input(INPUT_POST, 'gameID');
$gameTypeID = filter_input(INPUT_POST, 'gameTypeID', FILTER_SANITIZE_SPECIAL_CHARS);
$gameName = filter_input(INPUT_POST, 'gameName', FILTER_SANITIZE_SPECIAL_CHARS);
$pageName = filter_input(INPUT_POST, 'pageName');
$media = filter_input(INPUT_POST, 'media');
$text = filter_input(INPUT_POST, 'text');
$pageType = filter_input(INPUT_POST, 'pageType');
$pageDesc = filter_input(INPUT_POST, 'pageDesc');
$count = filter_input(INPUT_POST, 'count');
$gameAbrv = getGameAbrv($gameID);

for ($i=0; $i < $count; $i++) {
    $location_num[$i] = filter_input(INPUT_POST, 'location_num'.$i);
}

switch ($runSwitch) {
    //Sends to Homepage edit page
    case '1Update':
      $pageName = getPageName($gameMapID);
      $gameName = getGameName($gameID);
      $gameInfo = getHomePage($gameMapID);
      include 'views/admin/builders/games/home.php';
      break;

    //recieves input to update Home Page
    case 'HomeUpdater':


      if (isset($gameMapID) && $gameMapID != '') {
        gamePageNameUploader($gameMapID, $pageName);
        $result = gameHomeUploader($text, $media, $gameMapID);
      } else {
        $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, $pageType);
        $result = newGameHomeUploader($text, $media, $gameMapID);
      }
      if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'home'.$pageType);
      } else {
        $error = "Sorry, something happened and we could not update the games content.";
        header("Location: .?action=G".$gameAbrv[0].'home'.$pageType);
      }
      break;

    //Sends to game play edit page
    case '2Update':
      $pageName = getPageName($gameMapID);
      $gameInfo = getGamePlayPage($gameMapID);
      include 'views/admin/builders/games/gamePlay.php';
      break;

    //recieves input to update game Play page
    case 'gamePlayUpdater':


      for ($i=0; $i < $count; $i++) {
        $gp[$i] = filter_input(INPUT_POST, 'gp'.$i);
        $gpn[$i] = filter_input(INPUT_POST, 'gpn'.$i);
        if (!(isset($gp[$i])) || $gp[$i] == '') {
          break;
        }
      }
      if (!isset($gameMapID) || $gameMapID == '') {
          $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, '', 0);
      }
      gamePageNameUploader($gameMapID, $pageName);
      $result = gamePlayUploader($gp, $gpn, $location_num, $gameMapID);
      if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'game_play'.$pageType);
      } else {
        $error = "Sorry, something happened and we could not update the pages content.";
        header("Location: .?action=G".$gameAbrv[0].'game_play'.$pageType);
      }
      break;


    //Sends to cut scenes edit page
    case '3Update':
        $pageName = getPageName($gameMapID);
        $pageDesc = getPageDesc($gameMapID);
        $gameInfo = getCutScenesPage($gameMapID);
        include 'views/admin/builders/games/cutScenes.php';
        break;

    //recieves input to update game Play page
    case 'cutScenesUpdater':


      for ($i=0; $i < $count; $i++) {
        $csTitle[$i] = filter_input(INPUT_POST, 'csTitle'.$i);
        $csMedia[$i] = filter_input(INPUT_POST, 'csMedia'.$i);
        $csDesc[$i] = filter_input(INPUT_POST, 'csDesc'.$i);
        if (!(isset($csMedia[$i])) || $csMedia[$i] == '') {
          break;
        }
      }
      if (!isset($gameMapID) || $gameMapID == '') {
          $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, '', 0);
      }
        gamePageNameUploader($gameMapID, $pageName, $pageDesc);
        $result = cutScenesUploader($csTitle, $csMedia, $csDesc, $location_num, $gameMapID);

      if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'scenes'.$pageType);
      } else {
        $error = "Sorry, something happened and we could not update the pages content.";
        header("Location: .?action=G".$gameAbrv[0].'scenes'.$pageType);
      }
      break;


    //Sends to abiliteis edit page
    case '4Update':
          $pageName = getPageName($gameMapID);
          $gameInfo = getAbilityPage($gameMapID);
          include 'views/admin/builders/games/ability.php';
          break;

    //recieves input to update Abilities page
    case 'abilityUpdater':


        for ($i=0; $i < $count; $i++) {
          $abName[$i] = filter_input(INPUT_POST, 'abName'.$i);
          $abMedia[$i] = filter_input(INPUT_POST, 'abMedia'.$i);
          $abDesc[$i] = filter_input(INPUT_POST, 'abDesc'.$i);

          if (!(isset($abDesc[$i])) || $abDesc[$i] == '') {
            break;
          }
        }

        if (!isset($gameMapID) || $gameMapID == '') {
            $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, '', 0);
        }
          gamePageNameUploader($gameMapID, $pageName, $pageDesc);
          $result = abilityUploader($abName, $abMedia, $abDesc, $location_num, $gameMapID);
        if ($result) {
          header("Location: .?action=G".$gameAbrv[0].'copy'.$pageType);
        } else {
          $error = "Sorry, something happened and we could not update the pages content.";
          header("Location: .?action=G".$gameAbrv[0].'copy'.$pageType);
        }
        break;

    //Sends to boss guide edit page
    case '6Update':
      $pageName = getPageName($gameMapID);
      $gameInfo = getBossPage($gameMapID, 0, 1);
      include 'views/admin/builders/games/boss.php';
      break;

    //recieves input to update boss guide page
    case 'bossUpdater':


        $mbcount = filter_input(INPUT_POST, 'mbcount');
        $bcount = filter_input(INPUT_POST, 'bcount');
        for ($i=0; $i < $mbcount; $i++) {
            $mbName[$i] = filter_input(INPUT_POST, 'mbName'.$i);
            $mbImage[$i] = filter_input(INPUT_POST, 'mbImage'.$i);
            $mbCopy[$i] = filter_input(INPUT_POST, 'mbCopy'.$i);
            $mbAdvice[$i] = filter_input(INPUT_POST, 'mbAdvice'.$i);
            $mbDiff[$i] = filter_input(INPUT_POST, 'mbDiff'.$i);
            $mbLocation_num[$i] = filter_input(INPUT_POST, 'mbLocation_num'.$i);
            if (!(isset($mbAdvice[$i])) || $mbAdvice[$i] == '') {
                break;
            }
        }
        for ($i=0; $i < $bcount; $i++) {
            $bName[$i] = filter_input(INPUT_POST, 'bName'.$i);
            $bImage[$i] = filter_input(INPUT_POST, 'bImage'.$i);
            $bAdvice[$i] = filter_input(INPUT_POST, 'bAdvice'.$i);
            $bDiff[$i] = filter_input(INPUT_POST, 'bDiff'.$i);
            $bLocation_num[$i] = filter_input(INPUT_POST, 'bLocation_num'.$i);
            if (!(isset($bAdvice[$i])) || $bAdvice[$i] == '') {
                break;
            }
        }

        //break;

        if (!isset($gameMapID) || $gameMapID == '') {
            $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, $pageType);
        }
          gamePageNameUploader($gameMapID, $pageName, $pageDesc);
            $result = bossUploader($mbName, $mbImage, $mbCopy, $mbAdvice, $mbDiff, $mbLocation_num, 0, $bName, $bImage, $bAdvice, $bDiff, $bLocation_num, 1, $gameMapID);

        if ($result) {
            header("Location: .?action=G".$gameAbrv[0].'boss0');
        }
        else {
            $error = "Sorry, something happened and we could not update the pages content.";
            header("Location: .?action=G".$gameAbrv[0].'boss0');
        }
        break;

    //Sends to collectables basic edit page
    case '9Update':
          $pageName = getPageName($gameMapID);
          $pageDesc = getPageDesc($gameMapID);
          $gameInfo = getCollectPage($gameMapID);
          include 'views/admin/builders/games/collectables.php';
          break;

    //recieves input to update collectables basic page
    case 'collectUpdater':


        for ($i=0; $i < $count; $i++) {
          $colName[$i] = filter_input(INPUT_POST, 'colTitle'.$i);
          $colMedia[$i] = filter_input(INPUT_POST, 'colMedia'.$i);
          $colDesc[$i] = filter_input(INPUT_POST, 'colDesc'.$i);
          if (!(isset($colDesc[$i])) || $colDesc[$i] == '') {
            break;
          }
        }

        if (!isset($gameMapID) || $gameMapID == '') {
            $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, $pageType);
        }
          gamePageNameUploader($gameMapID, $pageName, $pageDesc);
          $result = collectUploader($colName, $colMedia, $colDesc, $location_num, $gameMapID);
        if ($result) {
          header("Location: .?action=G".$gameAbrv[0].'collectable'.$pageType);
        } else {
          $error = "Sorry, something happened and we could not update the pages content.";
          header("Location: .?action=G".$gameAbrv[0].'collectable'.$pageType);
        }
        break;

    //Sends to collectables advanced edit page
    case '10Update':
          $kNum = filter_input(INPUT_POST, 'kNum');
          $jNum = filter_input(INPUT_POST, 'jNum');
          $iNum = filter_input(INPUT_POST, 'iNum');
          if (!isset($kNum)) {
              $kNum = 6; $jNum = 5; $iNum = 5;
          }
          $pageName = getPageName($gameMapID);
          $pageDesc = getPageDesc($gameMapID);
          $gameInfo = getCollectAdvPage($gameMapID);
          include 'views/admin/builders/games/collectablesAdv.php';
          break;

    //recieves input to update collectables advanced page
    case 'collectAdvUpdater':


        for ($k=1; $k <= 9; $k++) {
            $areaName[$k] = filter_input(INPUT_POST, 'areaName'.$k);
            $area_num[$k] = filter_input(INPUT_POST, 'area_num'.$k);
            if (!(isset($areaName[$k])) || $areaName[$k] == '') {
              break;
          }
            for ($j=1; $j <= 9; $j++) {
                $stageName[$k][$j] = filter_input(INPUT_POST, 'stageName'.$k.$j);
                $stage_num[$k][$j] = filter_input(INPUT_POST, 'stge_num'.$k.$j);
                if (!(isset($stageName[$k][$j])) || $stageName[$k][$j] == '') {
                  break;
                }

                for ($i=0; $i < 9; $i++) {
                    $location_num[$k][$j][$i] = filter_input(INPUT_POST, 'location_num'.$k.$j.$i);
                    $colName[$k][$j][$i] = filter_input(INPUT_POST, 'colTitle'.$k.$j.$i);
                    $colMedia[$k][$j][$i] = filter_input(INPUT_POST, 'colMedia'.$k.$j.$i);
                    $colDesc[$k][$j][$i] = filter_input(INPUT_POST, 'colDesc'.$k.$j.$i);
                    if (!(isset($colDesc[$k][$j][$i])) || $colDesc[$k][$j][$i] == '') {
                      break;
                    }
                }
            }
        }
        if (!isset($gameMapID) || $gameMapID == '') {
          $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, $pageType);
        }
        gamePageNameUploader($gameMapID, $pageName, $pageDesc);
        $result = collectAdvUploader($areaName, $stageName, $colName, $colMedia, $colDesc, $area_num, $stage_num, $location_num, $gameMapID);
        if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'advCollectable'.$pageType);
        } else {
        $error = "Sorry, something happened and we could not update the pages content.";
        header("Location: .?action=G".$gameAbrv[0].'advCollectable'.$pageType);
        }
        break;


    //Sends to Other edit page
    case '12Update':
        $pageName = getPageName($gameMapID);
        $pageDesc = getPageDesc($gameMapID);
        $pageContent = getOtherPage($gameMapID);
        include 'views/admin/builders/games/other.php';
        break;

    //recieves input to update Other page
    case 'otherUpdater':
        $pageContent = filter_input(INPUT_POST, 'pageContent');

      if (!isset($gameMapID) || $gameMapID == '') {
          $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, $pageType);
          $isNew = TRUE;
      } else {
          $isNew = FALSE;
      }
        gamePageNameUploader($gameMapID, $pageName, $pageDesc);
        $result = otherUploader($pageContent, $gameMapID, $isNew);
      if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'other'.$pageType);
      } else {
        $error = "Sorry, something happened and we could not update the pages content.";
        header("Location: .?action=G".$gameAbrv[0].'other'.$pageType);
      }
      break;

  default:
    $posts = displayPosts();
    include 'views/home.php';
    break;
  }
