<?php include 'views/head.php'; ?>

<?php if($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'admin') { ?>
    <b><?php if (isset($error)) { echo $error; } ?></b>
        <form action="." method="post">
          <fieldset class="border_none">
              <div>
              <label for="content">&nbsp;</label>
              <input type="hidden" name="content" id="content" value='<?php echo $content[0] ?>' required readonly>

              <label for="gameID">&nbsp;</label>
              <input type="hidden" name="gameID" id="gameID" value="<?php echo $content[1]   ?>" required readonly>

              <label for="gameTypeID">&nbsp;</label>
              <input type="hidden" name="gameTypeID" id="gameTypeID" value="<?php echo    $content[2] ?>" required readonly>

              <label for="gameName">&nbsp;</label>
              <input type="hidden" name="gameName" id="gameName" value="<?php echo    $content[3] ?>" required readonly>

              <label for="gameMapID">&nbsp;</label>
              <input type="hidden" name="gameMapID" id="gameMapID" value="<?php echo    $content[4] ?>" required readonly>

              <label for="pageName">&nbsp;</label>
              <input type="hidden" name="pageName" id="pageName" value="<?php echo    $content[5] ?>" required readonly>

              <?php $value = "AGAM".strval($content[2])."Update" ?>
             <label>&nbsp;</label>

             <input type="submit" name="action" value="<?php echo $value ?>">
          </fieldset>
        </form>

<?php }?>

<div id="title"><?php echo $content[5]; ?></div><br>

<?php if (isset($content[0]) && $content[0] != '') {
    echo $content[0];
} else {
    include 'construction.php';
}?>
<?php include 'views/foot.php'; ?>
