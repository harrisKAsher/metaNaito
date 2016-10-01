<?php include 'views/head.php'; ?>

<?php if($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'admin') { ?>
    <b><?php if (isset($error)) { echo $error; } ?></b>
        <form action="." method="post">
          <fieldset class="border_none">
              <div>

              <label for="gameID">&nbsp;</label>
              <input type="hidden" name="gameID" id="gameID" value="<?php echo $gameMapInfo[1] ?>" required readonly>

              <label for="gameTypeID">&nbsp;</label>
              <input type="hidden" name="gameTypeID" id="gameTypeID" value="<?php echo $gameMapInfo[2] ?>" required readonly>

              <label for="gameMapID">&nbsp;</label>
              <input type="hidden" name="gameMapID" id="gameMapID" value="<?php echo    $gameMapInfo[0] ?>" required readonly>

              <label for="pageType">&nbsp;</label>
              <input type="hidden" name="pageType" id="pageType" value="<?php echo $subType ?>" required readonly>

              <?php $value = "AGAM".strval($gameMapInfo[2])."Update" ?>
             <label>&nbsp;</label>

             <input type="submit" name="action" value="<?php echo $value ?>">
          </fieldset>
        </form>

<?php }?>

<div id="title"><?php echo $gameMapInfo[4]; ?></div><br>

<?php if (isset($gameMapInfo[0]) && $gameMapInfo[0] != '') {
    echo $content;
} else {
    include 'construction.php';
}?>
<?php include 'views/foot.php'; ?>
