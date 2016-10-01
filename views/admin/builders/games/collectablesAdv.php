<?php if (!$_SESSION['loggedin']) {
  header("Location: /");
} ?>

<?php include 'views/head.php'; ?>

<form action="." method="post">
      <fieldset class="border_none">
          <div>

          <label for="gameID">&nbsp;</label>
          <input type="hidden" name="gameID" id="gameID" value="<?php echo $gameID ?>" required readonly>

          <label for="gameTypeID">&nbsp;</label>
          <input type="hidden" name="gameTypeID" id="gameTypeID" value="<?php echo $gameTypeID ?>" required readonly>

          <label for="gameMapID">&nbsp;</label>
          <input type="hidden" name="gameMapID" id="gameMapID" value="<?php echo    $gameMapID ?>" required readonly>

          <label for="pageType">&nbsp;</label>
          <input type="hidden" name="pageType" id="pageType" value="<?php echo $pageType ?>" required readonly>
          <?php if (($kNum * $jNum * $iNum) > 210) {?>
            <h1>WARNING: YOU HAVE EXCEEDED 210!!! IF YOU TRY TO SUBMIT THIS IT WILL FAIL!!!</h1>
          <?php } ?>
          <b>WARNING: Multiply the numbers together if it exceds 210 their is almost garunteed to be a problem and anything you input will NOT BE SAVED!</b>
          <br />
          <label for="kNum">Number of Areas</label>
          <select name="kNum" id="kNum">
            <option value="1"<?php if($kNum == 1){echo 'selected="selected"'; }?>>1</option>
            <option value="2"<?php if($kNum == 2){echo 'selected="selected"'; }?>>2</option>
            <option value="3"<?php if($kNum == 3){echo 'selected="selected"'; }?>>3</option>
            <option value="4"<?php if($kNum == 4){echo 'selected="selected"'; }?>>4</option>
            <option value="5"<?php if($kNum == 5){echo 'selected="selected"'; }?>>5</option>
            <option value="6"<?php if($kNum == 6){echo 'selected="selected"'; }?>>6</option>
            <option value="7"<?php if($kNum == 7){echo 'selected="selected"'; }?>>7</option>
            <option value="8"<?php if($kNum == 8){echo 'selected="selected"'; }?>>8</option>
            <option value="9"<?php if($kNum == 9){echo 'selected="selected"'; }?>>9</option>
          </select>
          <br />
          <label for="jNum">Number of Stages per Area</label>
          <select name="jNum" id="jNum">
            <option value="1"<?php if($jNum == 1){echo 'selected="selected"'; }?>>1</option>
            <option value="2"<?php if($jNum == 2){echo 'selected="selected"'; }?>>2</option>
            <option value="3"<?php if($jNum == 3){echo 'selected="selected"'; }?>>3</option>
            <option value="4"<?php if($jNum == 4){echo 'selected="selected"'; }?>>4</option>
            <option value="5"<?php if($jNum == 5){echo 'selected="selected"'; }?>>5</option>
            <option value="6"<?php if($jNum == 6){echo 'selected="selected"'; }?>>6</option>
            <option value="7"<?php if($jNum == 7){echo 'selected="selected"'; }?>>7</option>
            <option value="8"<?php if($jNum == 8){echo 'selected="selected"'; }?>>8</option>
            <option value="9"<?php if($jNum == 9){echo 'selected="selected"'; }?>>9</option>
          </select>
          <br />
          <label for="iNum">Number of Collectables per Stage</label>
          <select name="iNum" id="iNum">
            <option value="1"<?php if($iNum == 1){echo 'selected="selected"'; }?>>1</option>
            <option value="2"<?php if($iNum == 2){echo 'selected="selected"'; }?>>2</option>
            <option value="3"<?php if($iNum == 3){echo 'selected="selected"'; }?>>3</option>
            <option value="4"<?php if($iNum == 4){echo 'selected="selected"'; }?>>4</option>
            <option value="5"<?php if($iNum == 5){echo 'selected="selected"'; }?>>5</option>
            <option value="6"<?php if($iNum == 6){echo 'selected="selected"'; }?>>6</option>
            <option value="7"<?php if($iNum == 7){echo 'selected="selected"'; }?>>7</option>
            <option value="8"<?php if($iNum == 8){echo 'selected="selected"'; }?>>8</option>
            <option value="9"<?php if($iNum == 9){echo 'selected="selected"'; }?>>9</option>
          </select>
          <br />
          <?php $value = "AGAM".strval($gameTypeID)."Update" ?>
         <label>&nbsp;</label>

         <input type="submit" name="action" value="<?php echo $value ?>">
      </fieldset>
    </form>

<h1><?php echo $gameName ?></h1>
<b><?php if (isset($error)) { echo $error; } ?></b>
<b>WARNING: You must only use "" for any tags, you can not use ' except for in text. If you use '' in any code in these fields the code will not work!</b><br /><br />


<form action="." method="post">
  <fieldset class="border_none">
     <label for="gameID">&nbsp;</label>
     <input type="hidden" name="gameID" id="gameID" value="<?php echo $gameID ?>" required readonly>

     <label for="gameTypeID">&nbsp;</label>
     <input type="hidden" name="gameTypeID" id="gameTypeID" value="<?php echo $gameTypeID ?>" required readonly>

     <label for="gameMapID">&nbsp;</label>
     <input type="hidden" name="gameMapID" id="gameMapID" value="<?php echo $gameMapID ?>" required readonly>

     <label for="pageType">&nbsp;</label>
            <input type="hidden" name="pageType" id="pageType" value="<?php echo $pageType ?>" required readonly>

    <label for="pageName">Page Name:</label>
    <input type="text" name="pageName" id="pageName" cols="1" rows="15" value="<?php if (isset($pageName)) { echo $pageName; }?>" required><br /><br />

    <label for="pageDesc">Page Description: (Don't forget P tags or BR tags!)</label><br />
    <textarea name="pageDesc" id="pageDesc" cols="116" rows="6"><?php if (isset($pageDesc)) { echo $pageDesc; }?></textarea>
    <br /><br /><br /><br />

    <?php $areaCount = 1; ?>
<?php for ($k=1; $k <= $kNum; $k++) { ?>
  <br /><br /><br /><br /><br /><br /><h1 class="center">\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\  AREA <?php echo $areaCount; ?>  //////////////////////////////////</h1><br /><br /><br /><br /><br /><br />
  <label for="area_num<?php echo $areaCount ?>">&nbsp;</label>
  <input type="hidden" name="area_num<?php echo $areaCount ?>" id="area_num<?php echo $areaCount ?>" value="<?php if (isset($gameInfo[area][$areaCount][0][1])) { echo $gameInfo[area][$areaCount][0][1]; } ?>" readonly>

  <label for="areaName<?php echo $areaCount ?>">Area Name:</label>
  <input type="text" name="areaName<?php echo $areaCount ?>" id="areaName<?php echo $areaCount ?>" value="<?php if (isset($gameInfo[area][$areaCount][0][0])) { echo $gameInfo[area][$areaCount][0][0]; } ?>" size="40">

    <?php $stageCount = 1; ?>
      <?php for ($j=1; $j <=$jNum; $j++) { ?>
        <br /><br /><br /><h1 class="center">*************** Stage <?php echo $stageCount; ?> ***************</h1><br /><br /><br />

        <label for="stge_num<?php echo $areaCount, $stageCount ?>">&nbsp;</label>
        <input type="hidden" name="stge_num<?php echo $areaCount, $stageCount ?>" id="stge_num<?php echo $areaCount, $stageCount ?>" value="<?php if (isset($gameInfo[stage][$areaCount][$stageCount][0][1])) { echo $gameInfo[stage][$areaCount][$stageCount][0][1]; } ?>" readonly>

        <label for="stageName<?php echo $areaCount, $stageCount ?>">Stage Name:</label>
        <input type="text" name="stageName<?php echo $areaCount, $stageCount ?>" id="stageName<?php echo $areaCount, $stageCount ?>" value="<?php if (isset($gameInfo[stage][$areaCount][$stageCount][0][0])) { echo $gameInfo[stage][$areaCount][$stageCount][0][0]; } ?>" size="40">
        <br /><br />
        <?php $count = 0; ?>
            <?php for ($i=0; $i < $iNum; $i++) { ?>

              <label for="location_num<?php echo $areaCount, $stageCount, $count ?>"></label>
              <input type="hidden" name="location_num<?php echo $areaCount, $stageCount, $count ?>" id="location_num<?php echo $areaCount, $stageCount, $count ?>" value="<?php if(isset($gameInfo[$areaCount][$stageCount][$count][0][3])) { echo $gameInfo[$areaCount][$stageCount][$count][0][3]; } ?>" readonly>

              <label for="colTitle<?php echo $areaCount, $stageCount, $count ?>">Title:</label>
              <input type="text" name="colTitle<?php echo $areaCount, $stageCount, $count ?>" id="colTitle<?php echo $areaCount, $stageCount, $count ?>" value="<?php if (isset($gameInfo[$areaCount][$stageCount][$count][0][1])) { echo $gameInfo[$areaCount][$stageCount][$count][0][1]; } ?>" size="40">

                <br /><br />

              <label for="colDesc<?php echo $areaCount, $stageCount, $count ?>">Desc: (Please use p tags!)</label><br /><br />
                <textarea name="colDesc<?php echo $areaCount, $stageCount, $count ?>" id="colDesc<?php echo $areaCount, $stageCount, $count ?>" cols="116" rows="6"><?php if (isset($gameInfo[$areaCount][$stageCount][$count][0][0])) { echo $gameInfo[$areaCount][$stageCount][$count][0][0]; } ?></textarea>

                <br /><br />

              <label for="colMedia<?php echo $areaCount, $stageCount, $count ?>">Media: (Please do not include BR tags or TABLES!)</label><br /><br />
                <textarea name="colMedia<?php echo $areaCount, $stageCount, $count ?>" id="colMedia<?php echo $areaCount, $stageCount, $count ?>" cols="116" rows="4"><?php if (isset($gameInfo[$areaCount][$stageCount][$count][0][2])) { echo $gameInfo[$areaCount][$stageCount][$count][0][2]; } ?></textarea><br /><br /><hr />


                <?php $count++; } ?>
            <?php $stageCount++; } ?>
      <?php $areaCount++; } ?>
      <br />
      <br /><br />

     <label>&nbsp;</label>
     <input type="submit" name="action" value="AGAMcollectAdvUpdater">
  </fieldset>
</form>



<script src="js/builder.js"></script>
<?php include 'views/foot.php'; ?>
