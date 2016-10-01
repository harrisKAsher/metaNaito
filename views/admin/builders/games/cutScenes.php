<?php if (!$_SESSION['loggedin']) {
  header("Location: /");
} ?>

<?php include 'views/head.php'; ?>

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
    <textarea name="pageDesc" id="pageDesc" cols="85" rows="5"><?php if (isset($pageDesc)) { echo $pageDesc; }?></textarea>
    <br /><br /><br /><br />



    <?php $count = 0; ?>
        <?php for ($i=0; $i < 35; $i++) { ?>

          <label for="location_num<?php echo $count ?>">&nbsp;</label>
          <input type="hidden" name="location_num<?php echo $count ?>" id="location_num<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][3])) { echo $gameInfo[$count][0][3]; } ?>" readonly>

          <label for="csTitle<?php echo $count ?>">Title:</label>
          <input type="text" name="csTitle<?php echo $count ?>" id="csTitle<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][1])) { echo $gameInfo[$count][0][1]; } ?>" size="40">

            <br /><br />

          <label for="csMedia<?php echo $count ?>">Media:</label><br /><br />
            <textarea name="csMedia<?php echo $count ?>" id="csMedia<?php echo $count ?>" cols="60" rows="3"><?php if (isset($gameInfo[$count][0][0])) { echo $gameInfo[$count][0][0]; } ?></textarea><br />

            <br />

          <label for="csDesc<?php echo $count ?>">Desc: (no P tags or BR tags please!)</label><br /><br />
            <textarea name="csDesc<?php echo $count ?>" id="csDesc<?php echo $count ?>" cols="60" rows="4"><?php if (isset($gameInfo[$count][0][2])) { echo $gameInfo[$count][0][2]; } ?></textarea><br /><br /><hr />

        <?php $count++; } ?>
      <br />

      <label for="count">&nbsp;</label>
      <input type="hidden" name="count" id="count" value="<?php echo $count ?>" required readonly>

      <br /><br />

     <label>&nbsp;</label>
     <input type="submit" name="action" value="AGAMcutScenesUpdater">
  </fieldset>
</form>



<script src="js/builder.js"></script>
<?php include 'views/foot.php'; ?>
