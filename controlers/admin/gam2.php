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
$pageDesc = filter_input(INPUT_POST, 'pageDesc');
$count = filter_input(INPUT_POST, 'count');

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
      $gameAbrv = getGameAbrv($gameID);
      if (isset($gameMapID) && $gameMapID != '') {
        gamePageNameUploader($gameMapID, $pageName);
        $result = gameHomeUploader($text, $media, $gameMapID);
      } else {
        $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, 0);
        $result = newGameHomeUploader($text, $media, $gameMapID);
      }
      if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'home');
      } else {
        $error = "Sorry, something happened and we could not update the games content.";
        header("Location: .?action=G".$gameAbrv[0].'home');
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
      $gameAbrv = getGameAbrv($gameID);
      for ($i=0; $i < $count; $i++) {
        $gp[$i] = filter_input(INPUT_POST, 'gp'.$i);
        $gpn[$i] = filter_input(INPUT_POST, 'gpn'.$i);
        if (!(isset($gp[$i])) || $gp[$i] == '') {
          break;
        }
      }
      if (isset($gameMapID) && $gameMapID != '') {
        gamePageNameUploader($gameMapID, $pageName);
        $result = gamePlayUploader($gp, $gpn, $gameMapID);
      } else {
        $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, 0);
        $result = newGamPlayUploader($gp, $gpn, $gameMapID);
      }
      if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'home');
      } else {
        $error = "Sorry, something happened and we could not update the pages content.";
        header("Location: .?action=G".$gameAbrv[0].'home');
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
      $gameAbrv = getGameAbrv($gameID);
      for ($i=0; $i < $count; $i++) {
        $csTitle[$i] = filter_input(INPUT_POST, 'csTitle'.$i);
        $csMedia[$i] = filter_input(INPUT_POST, 'csMedia'.$i);
        $csDesc[$i] = filter_input(INPUT_POST, 'csDesc'.$i);
        if (!(isset($csMedia[$i])) || $csMedia[$i] == '') {
          break;
        }
      }
      if (isset($gameMapID) && $gameMapID != '') {
        gamePageNameUploader($gameMapID, $pageName, $pageDesc);
        $result = cutScenesUploader($csTitle, $csMedia, $csDesc, $gameMapID);
      } else {
        $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, 0);
        $result = newCutScenesUploader($csTitle, $csMedia, $csDesc, $gameMapID);
      }
      if ($result) {
        header("Location: .?action=G".$gameAbrv[0].'home');
      } else {
        $error = "Sorry, something happened and we could not update the pages content.";
        header("Location: .?action=G".$gameAbrv[0].'home');
      }
      break;

      //Sends to cut scenes edit page

    //Sends to abilities edit page
    case '4Update':
          //$pageName = getPageName($gameMapID);
          //$pageDesc = getPageDesc($gameMapID);
          //$gameInfo = getCutScenesPage($gameMapID);
          include 'views/admin/builders/games/ability.php';
          break;

    //recieves input to update abilites page
    case 'abilityUpdater':
        $gameAbrv = getGameAbrv($gameID);
        for ($i=0; $i < $count; $i++) {
          $abName[$i] = filter_input(INPUT_POST, 'abName'.$i);
          $abMedia[$i] = filter_input(INPUT_POST, 'abMedia'.$i);
          $abDesc[$i] = filter_input(INPUT_POST, 'abDesc'.$i);
          if (!(isset($abDesc[$i])) || $abDesc[$i] == '') {
            break;
          }
        }
        print_r($abName);
        break;
        if (isset($gameMapID) && $gameMapID != '') {
          gamePageNameUploader($gameMapID, $pageName, $pageDesc);
          $result = abilityUploader($abName, $abMedia, $abDesc, $gameMapID);
        }
        else {
          $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, '', 0);
          $result = newAbilityUploader($abName, $abMedia, $abDesc, $gameMapID);
          $break;
        }
        if ($result) {
          header("Location: .?action=G".$gameAbrv[0].'copy');
        } else {
          $error = "Sorry, something happened and we could not update the pages content.";
          header("Location: .?action=G".$gameAbrv[0].'copy');
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
        $gameAbrv = getGameAbrv($gameID);
        $mbcount = filter_input(INPUT_POST, 'mbcount');
        $bcount = filter_input(INPUT_POST, 'bcount');
        for ($i=0; $i < $mbcount; $i++) {
            $mbName[$i] = filter_input(INPUT_POST, 'mbName'.$i);
            $mbImage[$i] = filter_input(INPUT_POST, 'mbImage'.$i);
            $mbCopy[$i] = filter_input(INPUT_POST, 'mbCopy'.$i);
            $mbAdvice[$i] = filter_input(INPUT_POST, 'mbAdvice'.$i);
            $mbDiff[$i] = filter_input(INPUT_POST, 'mbDiff'.$i);
            if (!(isset($mbAdvice[$i])) || $mbAdvice[$i] == '') {
                break;
            }
        }
        for ($i=0; $i < $bcount; $i++) {
            $bName[$i] = filter_input(INPUT_POST, 'bName'.$i);
            $bImage[$i] = filter_input(INPUT_POST, 'bImage'.$i);
            $bAdvice[$i] = filter_input(INPUT_POST, 'bAdvice'.$i);
            $bDiff[$i] = filter_input(INPUT_POST, 'bDiff'.$i);
            if (!(isset($bAdvice[$i])) || $bAdvice[$i] == '') {
                break;
            }
        }

        if (isset($gameMapID) && $gameMapID != '') {
            gamePageNameUploader($gameMapID, $pageName, $pageDesc);
            $result = bossUploader($mbName, $mbImage, $mbCopy, $mbAdvice, $mbDiff, 0, $bName, $bImage, $bAdvice, $bDiff, 1, $gameMapID);
        }
        else {
            $gameMapID = newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, 0);
            $result = newBossUploader($mbName, $mbImage, $mbCopy, $mbAdvice, $mbDiff, 0, $bName, $bImage, $bAdvice, $bDiff, 1, $gameMapID);
        }
        if ($result) {
            header("Location: .?action=G".$gameAbrv[0].'home');
        }
        else {
            $error = "Sorry, something happened and we could not update the pages content.";
            header("Location: .?action=G".$gameAbrv[0].'home');
        }
        break;

  default:
    $posts = displayPosts();
    include 'views/home.php';
    break;
  }
