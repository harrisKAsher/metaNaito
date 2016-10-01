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

    <label for="pageName">Page Name:</label><br /><br />
    <input type="text" name="pageName" id="pageName" cols="1" rows="15" value="<?php if (isset($pageName)) { echo $pageName; }?>" required>
    <?php $count = 0; ?>
      <table>
        <?php for ($i=0; $i < 10; $i++) { ?>
        <tr>
          <td>

            <label for="location_num<?php echo $count ?>">&nbsp;</label>
            <input type="hidden" name="location_num<?php echo $count ?>" id="location_num<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][2])) { echo $gameInfo[$count][0][2]; } ?>" readonly>

          <label for="gp<?php echo $count ?>"></label><br /><br />
            <textarea name="gp<?php echo $count ?>" id="gp<?php echo $count ?>" cols="35" rows="4" placeholder="Image/Video code"><?php if (isset($gameInfo[$count][0][0])) { echo $gameInfo[$count][0][0]; } ?></textarea><br />

            <label for="gpn<?php echo $count ?>"></label>
            <input type="text" name="gpn<?php echo $count ?>" id="gpn<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][1])) { echo $gameInfo[$count][0][1]; } ?>" size="37" placeholder="Game Play Title">
            <?php $count++; ?>
          </td>
          <td>

            <label for="location_num<?php echo $count ?>">&nbsp;</label>
            <input type="hidden" name="location_num<?php echo $count ?>" id="location_num<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][2])) { echo $gameInfo[$count][0][2]; } ?>" readonly>

          <label for="gp<?php echo $count ?>"></label><br /><br />
            <textarea name="gp<?php echo $count ?>" id="gp<?php echo $count ?>" cols="35" rows="4" placeholder="Image/Video code"><?php if (isset($gameInfo[$count][0][0])) { echo $gameInfo[$count][0][0]; } ?></textarea><br />

            <label for="gpn<?php echo $count ?>"></label>
            <input type="text" name="gpn<?php echo $count ?>" id="gpn<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][1])) { echo $gameInfo[$count][0][1]; } ?>" size="37" placeholder="Game Play Title">
            <?php $count++; ?>
          </td>
          <td>

          <label for="location_num<?php echo $count ?>">&nbsp;</label>
          <input type="hidden" name="location_num<?php echo $count ?>" id="location_num<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][2])) { echo $gameInfo[$count][0][2]; } ?>" readonly>

          <label for="gp<?php echo $count ?>"></label><br /><br />
            <textarea name="gp<?php echo $count ?>" id="gp<?php echo $count ?>" cols="35" rows="4" placeholder="Image/Video code"><?php if (isset($gameInfo[$count][0][0])) { echo $gameInfo[$count][0][0]; } ?></textarea><br />

            <label for="gpn<?php echo $count ?>"></label>
            <input type="text" name="gpn<?php echo $count ?>" id="gpn<?php echo $count ?>" value="<?php if (isset($gameInfo[$count][0][1])) { echo $gameInfo[$count][0][1]; } ?>" size="37" placeholder="Game Play Title">
            <?php $count++; ?>
          </td>
        </tr>
        <?php } ?>
      </table>
      <br />

      <label for="count">&nbsp;</label>
      <input type="hidden" name="count" id="count" value="<?php echo $count ?>" required readonly>

      <br /><br />

     <label>&nbsp;</label>
     <input type="submit" name="action" value="AGAMgamePlayUpdater">
  </fieldset>
</form>



<script src="js/builder.js"></script>
<?php include 'views/foot.php'; ?>
