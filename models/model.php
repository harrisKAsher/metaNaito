<?php
// GENERAL STUFF AND HOME PAGE

function passUpdate($userID, $password){
    global $db;
    $query = 'UPDATE users
                SET password = :password
                WHERE userID = :userID';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':userID', $userID);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $result = $stmt->rowCount();
        $stmt->closeCursor();
        return $result;
}

function userInfo($userName){
    global $db;
    $query = 'SELECT * FROM users
            WHERE userName = :userName';
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $userName);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function newPost($userName, $date, $text, $media, $break){
    global $db;
    $query = 'INSERT INTO front_page
                (date, creator, text, media, break)
                VALUES
                (:date, :userName, :text, :media, :break)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':userName', $userName);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':text', $text);
    $stmt->bindValue(':media', $media);
    $stmt->bindValue(':break', $break);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}






// ***********************GAME SECTION STUFF************************** \\




// GENERAL

// Will  be worthless when everything is done
function getPage($gameABRV, $typeName){
    global $db;
    //gets game's ID
    $query = 'SELECT game_id, name_US FROM games
            WHERE game_abrv = :gameABRV';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameABRV', $gameABRV);
    $stmt->execute();
    $gameIDArray = $stmt->fetchAll();
    $stmt->closeCursor();

    //gets game_type_id
    $query = 'SELECT game_type_id FROM game_type
            WHERE discription = :typeName';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':typeName', $typeName);
    $stmt->execute();
    $gameTypeIDArray = $stmt->fetch();
    $stmt->closeCursor();

    //Converts arrays to variables
    $gameID = $gameIDArray[0][0];
    $gameName = $gameIDArray[0][1];
    $gameTypeID = $gameTypeIDArray[0];

    //gets contnet
    $query = 'SELECT content, game_map_id, page_name FROM game_map
            WHERE game_id = :gameID AND game_type_id = :gameTypeID' ;
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameID', $gameID);
    $stmt->bindValue(':gameTypeID', $gameTypeID);
    $stmt->execute();
    $content = $stmt->fetchAll();
    $stmt->closeCursor();
    $info = [$content[0][0], $gameID, $gameTypeID, $gameName, $content[0][1], $content[0][2]];
    return $info;
}

function getMap($gameABRV, $typeName, $subType){
    global $db;
    //gets game's ID
    $query = 'SELECT game_id, name_US FROM games
            WHERE game_abrv = :gameABRV';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameABRV', $gameABRV);
    $stmt->execute();
    $gameIDArray = $stmt->fetchAll();
    $stmt->closeCursor();

    //gets game_type_id
    $query = 'SELECT game_type_id FROM game_type
            WHERE discription = :typeName';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':typeName', $typeName);
    $stmt->execute();
    $gameTypeIDArray = $stmt->fetch();
    $stmt->closeCursor();

    //Converts arrays to variables
    $gameID = $gameIDArray[0][0];
    $gameName = $gameIDArray[0][1];
    $gameTypeID = $gameTypeIDArray[0];

    //gets map info
    $query = 'SELECT game_map_id, page_name, page_description, page_sub_type FROM game_map
            WHERE game_id = :gameID AND game_type_id = :gameTypeID AND page_sub_type = :subType';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameID', $gameID);
    $stmt->bindValue(':gameTypeID', $gameTypeID);
    $stmt->bindValue(':subType', $subType);
    $stmt->execute();
    $content = $stmt->fetchAll();
    $stmt->closeCursor();
    $info = [$content[0][0], $gameID, $gameTypeID, $gameName, $content[0][1], $content[0][2], $content[0][3]];
    return $info;
}

function newGamePageCreator($gameID, $gameTypeID, $pageName, $pageDesc, $subType){
    global $db;
    $query = 'INSERT INTO game_map
                (game_id, game_type_id, page_name, page_description, page_sub_type)
                VALUES
                (:gameID, :gameTypeID, :pageName, :pageDesc, :subType)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameID', $gameID);
        $stmt->bindValue(':gameTypeID', $gameTypeID);
        $stmt->bindValue(':pageName', $pageName);
        $stmt->bindValue(':pageDesc', $pageDesc);
        $stmt->bindValue(':subType', $subType);
        $stmt->execute();
        $stmt->rowCount();
        $stmt->closeCursor();

        $query = 'SELECT game_map_id FROM game_map
                WHERE game_id = :gameID AND game_type_id = :gameTypeID AND page_sub_type = :subType' ;
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameID', $gameID);
        $stmt->bindValue(':gameTypeID', $gameTypeID);
        $stmt->bindValue(':subType', $subType);
        $stmt->execute();
        $gameMapID = $stmt->fetch();
        $stmt->closeCursor();
        return $gameMapID[0];
}

function getPageName($gameMapID){
    global $db;
    $query = 'SELECT page_name FROM game_map
            WHERE game_map_id = :gameMapID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameMapID', $gameMapID);
    $stmt->execute();
    $pageName = $stmt->fetch();
    $stmt->closeCursor();
    return $pageName[0];
}

function getPageDesc($gameMapID){
    global $db;
    $query = 'SELECT page_description FROM game_map
            WHERE game_map_id = :gameMapID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameMapID', $gameMapID);
    $stmt->execute();
    $pageDesc= $stmt->fetch();
    $stmt->closeCursor();
    return $pageDesc[0];
}

function getGameName($gameID){
    global $db;
    $query = 'SELECT name_US FROM games
            WHERE game_id = :gameID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameID', $gameID);
    $stmt->execute();
    $gameName = $stmt->fetch();
    $stmt->closeCursor();
    return $gameName[0];
}

function getGameNames($gameID){
    global $db;
    $query = 'SELECT name_US, name_EU, name_JP, game_abrv FROM games
            WHERE game_id = :gameID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameID', $gameID);
    $stmt->execute();
    $gameNames = $stmt->fetchAll();
    $stmt->closeCursor();
    return $gameNames;
}

function getGameAbrv($gameID){
    global $db;
    $query = 'SELECT game_abrv FROM games
            WHERE game_id = :gameID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameID', $gameID);
    $stmt->execute();
    $gameAbrv = $stmt->fetch();
    $stmt->closeCursor();
    return $gameAbrv;
}


function gamePageNameUploader($gameMapID, $pageName, $pageDesc){
    $currentDate = date('Y-m-d H:i:s');
    global $db;
    $query = 'UPDATE game_map
                SET page_name = :pageName, page_description = :pageDesc, last_update = :currentDate
                WHERE game_map_id = :gameMapID';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':pageName', $pageName);
        $stmt->bindValue(':pageDesc', $pageDesc);
        $stmt->bindValue(':currentDate', $currentDate);
        $stmt->execute();
        $stmt->rowCount();
        $stmt->closeCursor();
    }

//Will be worthless when done upating things to indivudal tables
function gameUploader($content, $gameMapID, $pageName){
    global $db;
    $query = 'UPDATE game_map
                SET content = :content, page_name = :pageName
                WHERE game_map_id = :gameMapID';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':pageName', $pageName);
        $stmt->bindValue(':content', $content);
        $stmt->execute();
        $result = $stmt->rowCount();
        $stmt->closeCursor();
        return $result;
}

// OLD??????
function newGameUploader($content, $gameID, $gameTypeID, $pageName){
    global $db;
    $query = 'INSERT INTO game_map
                (game_id, game_type_id, page_name, content)
                VALUES
                (:gameID, :gameTypeID, :pageName, :content)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameID', $gameID);
        $stmt->bindValue(':gameTypeID', $gameTypeID);
        $stmt->bindValue(':pageName', $pageName);
        $stmt->bindValue(':content', $content);
        $stmt->execute();
        $result = $stmt->rowCount();
        $stmt->closeCursor();
        return $result;
}






// HOME PAGE

function newGameHomeUploader($text, $boxArt, $gameMapID){
    global $db;
    $query = 'INSERT INTO game_home
                (game_map_id, description, boxart)
                VALUES
                (:gameMapID, :text, :boxArt)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameID', $gameID);
        $stmt->bindValue(':text', $text);
        $stmt->bindValue(':boxArt', $boxArt);
        $stmt->execute();
        $stmt->rowCount();
        $stmt->closeCursor();
}

function gameHomeUploader($text, $boxArt, $gameMapID){
    global $db;
    $query = 'UPDATE game_home
                SET description = :text, boxart = :boxArt, game_map_id = :gameMapID
                WHERE game_map_id = :gameMapID';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':text', $text);
        $stmt->bindValue(':boxArt', $boxArt);
        $stmt->execute();
        $result = $stmt->rowCount();
        $stmt->closeCursor();
        return $result;
}

function getHomePage($gameMapID){
    global $db;
    $query = 'SELECT description, boxart FROM game_home
            WHERE game_map_id = :gameMapID';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':gameMapID', $gameMapID);
    $stmt->execute();
    $gameInfo = $stmt->fetchAll();
    $stmt->closeCursor();
    return $gameInfo;
}





// GAME PLAY
function gamePlayUploader($gp, $gpn, $location_num, $gameMapID){
    $i = 0;
    while (isset($gp[$i]) || $gp[$i] != '' || $gp[$i] != NULL) {
        if (isset($location_num[$i]) && $location_num[$i] != '' && $location_num[$i] != NULL) {
            global $db;
            $query = 'UPDATE game_play
                        SET media = :media, title = :title
                        WHERE game_map_id = :gameMapID AND location_num = :i';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':gameMapID', $gameMapID);
                $stmt->bindValue(':media', $gp[$i]);
                $stmt->bindValue(':title', $gpn[$i]);
                $stmt->bindValue(':i', $i);
                $stmt->execute();
                $result = $stmt->rowCount();
                $stmt->closeCursor();
        }
        else {
            global $db;
            $query = 'INSERT INTO game_play
                        (game_map_id, location_num, media, title)
                        VALUES
                        (:gameMapID, :i, :media, :title)';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':gameMapID', $gameMapID);
                $stmt->bindValue(':media', $gp[$i]);
                $stmt->bindValue(':title', $gpn[$i]);
                $stmt->bindValue(':i', $i);
                $stmt->execute();
                $result = $stmt->rowCount();
                $stmt->closeCursor();
        }
        $i++;
    }
    return $result;
}

function getGamePlayPage($gameMapID){
    $i = 0;
    while (true) {
        global $db;
        $query = 'SELECT media, title, location_num FROM game_play
                WHERE game_map_id = :gameMapID AND location_num = :i';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':i', $i);
        $stmt->execute();
        $gameInfo[$i] = $stmt->fetchAll();
        $stmt->closeCursor();

        if (!isset($gameInfo[$i]) || $gameInfo[$i] == '' || $gameInfo[$i] == NULL) {
            break;
        }
        $i++;
    }
    return $gameInfo;
}



// CUT SCENES
function cutScenesUploader($csTitle, $csMedia, $csDesc, $location_num, $gameMapID){
    $i = 0;
    while (isset($csMedia[$i]) || $csMedia[$i] != '' || $csMedia[$i] != NULL) {
        if (isset($location_num[$i]) && $location_num[$i] != '' && $location_num[$i] != NULL) {
            global $db;
            $query = 'UPDATE cut_scenes
                        SET media = :media, title = :title, description = :desc
                        WHERE game_map_id = :gameMapID AND location_num = :i';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':gameMapID', $gameMapID);
                $stmt->bindValue(':title', $csTitle[$i]);
                $stmt->bindValue(':media', $csMedia[$i]);
                $stmt->bindValue(':desc', $desc = $csDesc[$i]);
                $stmt->bindValue(':i', $i);
                $stmt->execute();
                $result = $stmt->rowCount();
                $stmt->closeCursor();
            }
            else {
                global $db;
                $query = 'INSERT INTO cut_scenes
                            (game_map_id, location_num, title, media, description)
                            VALUES
                            (:gameMapID, :i, :title, :media, :desc)';
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(':gameMapID', $gameMapID);
                    $stmt->bindValue(':title', $csTitle[$i]);
                    $stmt->bindValue(':media', $csMedia[$i]);
                    $stmt->bindValue(':desc', $desc = $csDesc[$i]);
                    $stmt->bindValue(':i', $i);
                    $stmt->execute();
                    $result = $stmt->rowCount();
                    $stmt->closeCursor();
            }
            $i++;
    }
    return $result;
}

function getCutScenesPage($gameMapID){
    $i = 0;
    while (true) {
        global $db;
        $query = 'SELECT media, title, description, location_num FROM cut_scenes
                WHERE game_map_id = :gameMapID AND location_num = :i';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':i', $i);
        $stmt->execute();
        $gameInfo[$i] = $stmt->fetchAll();
        $stmt->closeCursor();

        if (!isset($gameInfo[$i]) || $gameInfo[$i] == '' || $gameInfo[$i] == NULL) {
            break;
        }
        $i++;
    }
    return $gameInfo;
}


// Abilities
function abilityUploader($abName, $abMedia, $abDesc, $location_num, $gameMapID){
    $i = 0;
    while (isset($abDesc[$i]) || $abDesc[$i] != '' || $abDesc[$i] != NULL) {
        if (isset($location_num[$i]) && $location_num[$i] != '' && $location_num[$i] != NULL) {
            global $db;
            $query = 'UPDATE game_abilities
                        SET media = :media, name = :name, description = :desc
                        WHERE game_map_id = :gameMapID AND location_num = :i';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':name', $abName[$i]);
            $stmt->bindValue(':media', $abMedia[$i]);
            $stmt->bindValue(':desc', $abDesc[$i]);
            $stmt->bindValue(':i', $i);
            $stmt->execute();
            $result = $stmt->rowCount();
            $stmt->closeCursor();
        } else {
            global $db;
            $query = 'INSERT INTO game_abilities
                        (game_map_id, location_num, name, media, description)
                        VALUES
                        (:gameMapID, :i, :name, :media, :desc)';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':name', $abName[$i]);
            $stmt->bindValue(':media', $abMedia[$i]);
            $stmt->bindValue(':desc', $abDesc[$i]);
            $stmt->bindValue(':i', $i);
            $stmt->execute();
            $result = $stmt->rowCount();
            $stmt->closeCursor();
        }
        $i++;
    }
    return $result;
}

function getAbilityPage($gameMapID){
    $i = 0;
    while (true) {
        global $db;
        $query = 'SELECT media, name, description, location_num FROM game_abilities
                WHERE game_map_id = :gameMapID AND location_num = :i';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':i', $i);
        $stmt->execute();
        $gameInfo[$i] = $stmt->fetchAll();
        $stmt->closeCursor();

        if (!isset($gameInfo[$i]) || $gameInfo[$i] == '' || $gameInfo[$i] == NULL) {
            break;
        }
        $i++;
    }
    return $gameInfo;
}

//BOSS
function bossUploader($mbName, $mbImage, $mbCopy, $mbAdvice, $mbDiff, $mbLocation_num, $mbType, $bName, $bImage, $bAdvice, $bDiff, $bLocation_num, $bType, $gameMapID){
    $i = 0;
    while (isset($mbAdvice[$i]) || $mbAdvice[$i] != '' || $mbAdvice[$i] != NULL) {
        if (isset($mbLocation_num[$i]) && $mbLocation_num[$i] != '' && $mbLocation_num[$i] != NULL) {
        global $db;
        $query = 'UPDATE game_boss
                    SET name = :name, image = :image, ability = :copy, advice = :advice, difficulty = :diff
                    WHERE game_map_id = :gameMapID AND type = :type AND location_num = :i';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':name', $mbName[$i]);
            $stmt->bindValue(':image', $mbImage[$i]);
            $stmt->bindValue(':copy', $mbCopy[$i]);
            $stmt->bindValue(':advice', $mbAdvice[$i]);
            $stmt->bindValue(':diff', $mbDiff[$i]);
            $stmt->bindValue(':type', $mbType);
            $stmt->bindValue(':i', $i);
            $stmt->execute();
            $result = $stmt->rowCount();
            $stmt->closeCursor();
        }
        else {
            global $db;
            $query = 'INSERT INTO game_boss
                        (game_map_id, location_num, type, name, image, ability, advice, difficulty)
                        VALUES
                        (:gameMapID, :i, :type, :name, :image, :copy, :advice, :diff)';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':gameMapID', $gameMapID);
                $stmt->bindValue(':name', $mbName[$i]);
                $stmt->bindValue(':image', $mbImage[$i]);
                $stmt->bindValue(':copy', $mbCopy[$i]);
                $stmt->bindValue(':advice', $mbAdvice[$i]);
                $stmt->bindValue(':diff', $mbDiff[$i]);
                $stmt->bindValue(':type', $mbType);
                $stmt->bindValue(':i', $i);
                $stmt->execute();
                $result = $stmt->rowCount();
                $stmt->closeCursor();
        }
        $i++;
    }
    $i = 0;
    while (isset($bAdvice[$i]) || $bAdvice[$i] != '' || $bAdvice[$i] != NULL) {
        if (isset($bLocation_num[$i]) && $bLocation_num[$i] != '' && $bLocation_num[$i] != NULL) {
        global $db;
        $query = 'UPDATE game_boss
                    SET name = :name, image = :image, advice = :advice, difficulty = :diff
                    WHERE game_map_id = :gameMapID AND type = :type AND location_num = :i';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':name', $bName[$i]);
            $stmt->bindValue(':image', $bImage[$i]);
            $stmt->bindValue(':advice', $bAdvice[$i]);
            $stmt->bindValue(':diff', $bDiff[$i]);
            $stmt->bindValue(':type', $bType);
            $stmt->bindValue(':i', $i);
            $stmt->execute();
            $result = $stmt->rowCount();
            $stmt->closeCursor();
    }
    else {
        global $db;
        $query = 'INSERT INTO game_boss
                    (game_map_id, location_num, type, name, image, advice, difficulty)
                    VALUES
                    (:gameMapID, :i, :type, :name, :image, :advice, :diff)';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':name', $bName[$i]);
            $stmt->bindValue(':image', $bImage[$i]);
            $stmt->bindValue(':advice', $bAdvice[$i]);
            $stmt->bindValue(':diff', $bDiff[$i]);
            $stmt->bindValue(':type', $bType);
            $stmt->bindValue(':i', $i);
            $stmt->execute();
            $result = $stmt->rowCount();
            $stmt->closeCursor();
        }
        $i++;
    }
    return $result;
}

function getBossPage($gameMapID, $mbType, $bType){
    $i = 0;
    while (true) {
        global $db;
        $query = 'SELECT name, image, advice, difficulty, ability FROM game_boss
                WHERE game_map_id = :gameMapID AND type = :type AND location_num = :i';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':i', $i);
        $stmt->bindValue(':type', $mbType);
        $stmt->execute();
        $gameInfo[mb][$i] = $stmt->fetchAll();
        $stmt->closeCursor();

        if (!isset($gameInfo[mb][$i]) || $gameInfo[mb][$i] == '' || $gameInfo[mb][$i] == NULL) {
            break;
        }
        $i++;
    }
    $i = 0;
    while (true) {
        global $db;
        $query = 'SELECT name, image, advice, difficulty FROM game_boss
                WHERE game_map_id = :gameMapID AND type = :type AND location_num = :i';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':i', $i);
        $stmt->bindValue(':type', $bType);
        $stmt->execute();
        $gameInfo[b][$i] = $stmt->fetchAll();
        $stmt->closeCursor();

        if (!isset($gameInfo[b][$i]) || $gameInfo[b][$i] == '' || $gameInfo[b][$i] == NULL) {
            break;
        }
        $i++;
    }
    return $gameInfo;
}

//COLLECTABLES - BASIC

function collectUploader($colName, $colMedia, $colDesc, $location_num, $gameMapID){
    $i = 0;
    while (isset($colDesc[$i]) || $colDesc[$i] != '' || $colDesc[$i] != NULL) {
        if (isset($location_num[$i]) && $location_num[$i] != '' && $location_num[$i] != NULL) {
            global $db;
            $query = 'UPDATE game_collectables
                        SET media = :media, title = :title, description = :desc
                        WHERE game_map_id = :gameMapID AND location_num = :i';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':gameMapID', $gameMapID);
                $stmt->bindValue(':title', $colName[$i]);
                $stmt->bindValue(':media', $colMedia[$i]);
                $stmt->bindValue(':desc', $desc = $colDesc[$i]);
                $stmt->bindValue(':i', $i);
                $stmt->execute();
                $result = $stmt->rowCount();
                $stmt->closeCursor();
            }
            else {
                global $db;
                $query = 'INSERT INTO game_collectables
                            (game_map_id, location_num, title, media, description)
                            VALUES
                            (:gameMapID, :i, :title, :media, :desc)';
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(':gameMapID', $gameMapID);
                    $stmt->bindValue(':title', $colName[$i]);
                    $stmt->bindValue(':media', $colMedia[$i]);
                    $stmt->bindValue(':desc', $desc = $colDesc[$i]);
                    $stmt->bindValue(':i', $i);
                    $stmt->execute();
                    $result = $stmt->rowCount();
                    $stmt->closeCursor();
            }
            $i++;
    }
    return $result;
}

function getCollectPage($gameMapID){
    $i = 0;
    while (true) {
        global $db;
        $query = 'SELECT description, title, media, location_num FROM game_collectables
                WHERE game_map_id = :gameMapID AND location_num = :i';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':i', $i);
        $stmt->execute();
        $gameInfo[$i] = $stmt->fetchAll();
        $stmt->closeCursor();

        if (!isset($gameInfo[$i]) || $gameInfo[$i] == '' || $gameInfo[$i] == NULL) {
            break;
        }
        $i++;
    }
    return $gameInfo;
}

//COLLECTABLES - ADV

function collectAdvUploader($areaName, $stageName, $colName, $colMedia, $colDesc, $area_num, $stage_num, $location_num, $gameMapID){
    $k = 1;
    while (isset($areaName[$k]) || $areaName[$k] != '' || $areaName[$k] != NULL) {
        $j = 1;
        while (isset($stageName[$k][$j]) || $stageName[$k][$j] != '' || $stageName[$k][$j] != NULL) {
            $i = 0;
            while (isset($colDesc[$k][$j][$i]) || $colDesc[$k][$j][$i] != '' || $colDesc[$k][$j][$i] != NULL) {

                $area_check = (isset($area_num[$k]) && $area_num[$k] != '' && $area_num[$k] != NULL);
                $stage_check = (isset($stage_num[$k][$j]) && $stage_num[$k][$j] != '' && $stage_num[$k][$j] != NULL);
                $location_check = (isset($location_num[$k][$j][$i])  && $location_num[$k][$j][$i] != NULL && $location_num[$k][$j][$i] != '');
                if ($area_check && $stage_check && $location_check) {
                    global $db;
                    $query = 'UPDATE game_collectables_adv
                                SET area_name = :areaName, stage_name = :stageName, media = :media, title = :title, description = :desc
                                WHERE game_map_id = :gameMapID AND area_num = :k AND stage_num = :j AND location_num = :i';
                        $stmt = $db->prepare($query);
                        $stmt->bindValue(':gameMapID', $gameMapID);
                        $stmt->bindValue(':areaName', $areaName[$k]);
                        $stmt->bindValue(':stageName', $stageName[$k][$j]);
                        $stmt->bindValue(':title', $colName[$k][$j][$i]);
                        $stmt->bindValue(':media', $colMedia[$k][$j][$i]);
                        $stmt->bindValue(':desc', $desc = $colDesc[$k][$j][$i]);
                        $stmt->bindValue(':k', $k);
                        $stmt->bindValue(':j', $j);
                        $stmt->bindValue(':i', $i);
                        $stmt->execute();
                        $result = $stmt->rowCount();
                        $stmt->closeCursor();
                    }
                    else {
                        global $db;
                        $query = 'INSERT INTO game_collectables_adv
                                    (game_map_id, area_num, area_name, stage_num, stage_name, location_num, title, media, description)
                                    VALUES
                                    (:gameMapID, :k, :areaName, :j, :stageName, :i, :title, :media, :desc)';
                            $stmt = $db->prepare($query);
                            $stmt->bindValue(':gameMapID', $gameMapID);
                            $stmt->bindValue(':areaName', $areaName[$k]);
                            $stmt->bindValue(':stageName', $stageName[$k][$j]);
                            $stmt->bindValue(':title', $colName[$k][$j][$i]);
                            $stmt->bindValue(':media', $colMedia[$k][$j][$i]);
                            $stmt->bindValue(':desc', $desc = $colDesc[$k][$j][$i]);
                            $stmt->bindValue(':k', $k);
                            $stmt->bindValue(':j', $j);
                            $stmt->bindValue(':i', $i);
                            $stmt->execute();
                            $result = $stmt->rowCount();
                            $stmt->closeCursor();
                    }
                    $i++;
                }
                $j++;
        }
        $k++;
    }
    return $result;
}

function getCollectAdvPage($gameMapID){
    $k = 1;
    while (true) {
        global $db;
        $query = 'SELECT area_name , area_num FROM game_collectables_adv
                WHERE game_map_id = :gameMapID AND area_num = :k';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->bindValue(':k', $k);
        $stmt->execute();
        $gameInfo[area][$k] = $stmt->fetchAll();
        $stmt->closeCursor();
        if (!isset($gameInfo[area][$k]) || $gameInfo[area][$k] == '' || $gameInfo[area][$k] == NULL) {
            break;
        }

        $j = 1;
        while (true) {
            global $db;
            $query = 'SELECT stage_name, stage_num FROM game_collectables_adv
                    WHERE game_map_id = :gameMapID AND area_num = :k AND stage_num = :j';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':k', $k);
            $stmt->bindValue(':j', $j);
            $stmt->execute();
            $gameInfo[stage][$k][$j] = $stmt->fetchAll();
            $stmt->closeCursor();
            if (!isset($gameInfo[stage][$k][$j]) || $gameInfo[stage][$k][$j] == '' || $gameInfo[stage][$k][$j] == NULL) {
                break;
            }

            $i = 0;
            while (true) {
                global $db;
                $query = 'SELECT description, title, media, location_num FROM game_collectables_adv
                        WHERE game_map_id = :gameMapID AND area_num = :k AND stage_num = :j AND location_num = :i';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':gameMapID', $gameMapID);
                $stmt->bindValue(':k', $k);
                $stmt->bindValue(':j', $j);
                $stmt->bindValue(':i', $i);
                $stmt->execute();
                $gameInfo[$k][$j][$i] = $stmt->fetchAll();
                $stmt->closeCursor();
                if (!isset($gameInfo[$k][$j][$i]) || $gameInfo[$k][$j][$i] == '' || $gameInfo[$k][$j][$i] == NULL) {
                    break;
                }
                $i++;
            }
            $j++;
        }
        $k++;
    }
    return $gameInfo;
}

// OTHER
function otherUploader($pageContent, $gameMapID, $isNew){
        if (!$isNew) {
            global $db;
            $query = 'UPDATE game_other
                        SET content = :pageContent
                        WHERE game_map_id = :gameMapID';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':pageContent', $pageContent);
            $stmt->execute();
            $result = $stmt->rowCount();
            $stmt->closeCursor();
        } else {
            global $db;
            $query = 'INSERT INTO game_other
                        (game_map_id, content)
                        VALUES
                        (:gameMapID, :pageContent)';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':gameMapID', $gameMapID);
            $stmt->bindValue(':pageContent', $pageContent);
            $stmt->execute();
            $result = $stmt->rowCount();
            $stmt->closeCursor();
        }
    return $result;
}

function getOtherPage($gameMapID){
        global $db;
        $query = 'SELECT content FROM game_other
                WHERE game_map_id = :gameMapID';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':gameMapID', $gameMapID);
        $stmt->execute();
        $gameInfo = $stmt->fetch();
        $stmt->closeCursor();
    return $gameInfo[0];
}
