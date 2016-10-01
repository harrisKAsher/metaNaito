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
    <input type="text" name="pageName" id="pageName" cols="1" rows="15" value="<?php if (isset($gameName)) { echo $gameName; } ?>" required readonly><br /><br />

     <label for="text"><?php echo $gameName ?>'s Home Page Contetnt: (please note that break tags are required for formating!)</label><br /><br />
     <textarea name="text" id="text" cols="100" rows="15" required><?php if (isset($gameInfo[0][0])) { echo $gameInfo[0][0]; } ?></textarea><br /><br />

     <label for="media">Games Case Img URL:</label><br /><br />
     <textarea name="media" id="media" cols="75" rows="7"><?php if (isset($gameInfo[0][1])) { echo $gameInfo[0][1]; } ?></textarea><br /><br />


     <label>&nbsp;</label>
     <input type="submit" name="action" value="AGAMHomeUpdater">
  </fieldset>
</form>




<?php include 'views/foot.php'; ?>
