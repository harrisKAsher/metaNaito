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
    <textarea name="pageDesc" id="pageDesc" cols="112" rows="5"><?php if (isset($pageDesc)) { echo $pageDesc; }?></textarea>
    <br /><br /><br />

    <label for="pageContent">Content: (Don't forget P tags or BR tags or anything else!)</label><br />
    <textarea name="pageContent" id="pageContent" cols="112" rows="25"><?php if (isset($pageContent)) { echo $pageContent; }?></textarea>
    <br /><br />
     <label>&nbsp;</label>
     <input type="submit" name="action" value="AGAMotherUpdater">
  </fieldset>
</form>



<script src="js/builder.js"></script>
<?php include 'views/foot.php'; ?>
