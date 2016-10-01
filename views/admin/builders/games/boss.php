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

    <label for="pageName">Page Name:</label>
    <input type="text" name="pageName" id="pageName" cols="1" rows="15" value="<?php if (isset($pageName)) { echo $pageName; }?>" required><br /><br />


    <h2>Mini Bosses</h2>

    <?php $mbcount = 0; ?>
        <?php for ($i=0; $i < 20; $i++) { ?>

          <label for="mbLocation_num<?php echo $mbcount ?>">&nbsp;</label>
          <input type="hidden" name="mbLocation_num<?php echo $mbcount ?>" id="mbLocation_num<?php echo $mbcount ?>" value="<?php if (isset($gameInfo[mb][$mbcount][0][3])) { echo $gameInfo[mb][$mbcount][0][3]; } ?>" readonly>

          <label for="mbName<?php echo $mbcount ?>">Name:</label>
          <input type="text" name="mbName<?php echo $mbcount ?>" id="mbName<?php echo $mbcount ?>" value="<?php if (isset($gameInfo[mb][$mbcount][0][0])) { echo $gameInfo[mb][$mbcount][0][0]; } ?>" size="40">

            <br /><br />

          <label for="mbImage<?php echo $mbcount ?>">Image:</label><br /><br />
            <textarea name="mbImage<?php echo $mbcount ?>" id="mbImage<?php echo $mbcount ?>" cols="115" rows="3"><?php if (isset($gameInfo[mb][$mbcount][0][1])) { echo $gameInfo[mb][$mbcount][0][1]; } ?></textarea><br />

            <br />

          <label for="mbCopy<?php echo $mbcount ?>">Ability:</label><br /><br />
            <input type="text" name="mbCopy<?php echo $mbcount ?>" id="mbCopy<?php echo $mbcount ?>" value="<?php if (isset($gameInfo[mb][$mbcount][0][4])) { echo $gameInfo[mb][$mbcount][0][4]; } ?>" size="40"><br /><br />

          <label for="mbAdvice<?php echo $mbcount ?>">Advice: (no P tags please!)</label><br /><br />
            <textarea name="mbAdvice<?php echo $mbcount ?>" id="mbAdvice<?php echo $mbcount ?>" cols="115" rows="6"><?php if (isset($gameInfo[mb][$mbcount][0][2])) { echo $gameInfo[mb][$mbcount][0][2]; } ?></textarea><br /><br />

          <label for="mbDiff<?php echo $mbcount ?>">Difficulty: (number between 1 and 20 (they are halfs so 2 is a whole star)</label><br /><br />
            <input type="text" name="mbDiff<?php echo $mbcount ?>" id="mbDiff<?php echo $mbcount ?>" value="<?php if (isset($gameInfo[mb][$mbcount][0][3])) { echo $gameInfo[mb][$mbcount][0][3]; } ?>" size="5"><br /><br /><hr />

        <?php $mbcount++; } ?>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <h2>Bosses</h2>

        <?php $bcount = 0; ?>
            <?php for ($i=0; $i < 20; $i++) { ?>

              <label for="bLocation_num<?php echo $bcount ?>">&nbsp;</label>
              <input type="hidden" name="bLocation_num<?php echo $bcount ?>" id="bLocation_num<?php echo $bcount ?>" value="<?php if (isset($gameInfo[b][$bcount][0][3])) { echo $gameInfo[b][$bcount][0][3]; } ?>" readonly>

              <label for="bName<?php echo $bcount ?>">Name:</label>
              <input type="text" name="bName<?php echo $bcount ?>" id="bName<?php echo $bcount ?>" value="<?php if (isset($gameInfo[b][$bcount][0][0])) { echo $gameInfo[b][$bcount][0][0]; } ?>" size="40">

                <br /><br />

              <label for="bImage<?php echo $bcount ?>">Image:</label><br /><br />
                <textarea name="bImage<?php echo $bcount ?>" id="bImage<?php echo $bcount ?>" cols="115" rows="3"><?php if (isset($gameInfo[b][$bcount][0][1])) { echo $gameInfo[b][$bcount][0][1]; } ?></textarea><br /><br />

              <label for="bAdvice<?php echo $bcount ?>">Advice: (no P tags please!)</label><br /><br />
                <textarea name="bAdvice<?php echo $bcount ?>" id="bAdvice<?php echo $bcount ?>" cols="115" rows="6"><?php if (isset($gameInfo[b][$bcount][0][2])) { echo $gameInfo[b][$bcount][0][2]; } ?></textarea><br /><br />

              <label for="bDiff<?php echo $bcount ?>">Difficulty: (nuber between 1 and 20 (they are halfs so 2 is a whole star)</label><br /><br />
                <input type="text" name="bDiff<?php echo $bcount ?>" id="bDiff<?php echo $bcount ?>" value="<?php if (isset($gameInfo[b][$bcount][0][3])) { echo $gameInfo[b][$bcount][0][3]; } ?>" size="5"><br /><br /><hr />

            <?php $bcount++; } ?>
          <br />
      <br />

      <label for="mbcount">&nbsp;</label>
      <input type="hidden" name="mbcount" id="mbcount" value="<?php echo $mbcount ?>" required readonly>

      <label for="bcount">&nbsp;</label>
      <input type="hidden" name="bcount" id="bcount" value="<?php echo $bcount ?>" required readonly>

      <br /><br />

     <label>&nbsp;</label>
     <input type="submit" name="action" value="AGAMbossUpdater">
  </fieldset>
</form>



<script src="js/builder.js"></script>
<?php include 'views/foot.php'; ?>
