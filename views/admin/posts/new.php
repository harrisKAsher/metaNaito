<?php if (!$_SESSION['loggedin']) {
  header("Location: /");
} ?>

<?php include 'views/head.php'; ?>

<h1>New Post</h1>
<b><?php if (isset($error)) { echo $error; } ?></b>

<form action="." method="post">
  <fieldset class="border_none">

     <label for="userName">User Name: </label>
     <input type="text" name="userName" id="userName" value="<?php echo $_SESSION['userName'] ?>" required readonly><br /><br />

     <label for="date">Date: </label>
     <input type="text" name="date" id="date"  size="40" value="<?php date_default_timezone_set('US/Eastern'); echo date('l, F jS, Y g:i A') ?> EST" required readonly><br /><br />

     <label for="text">Text (please note that break tags are required for formating!):</label><br /><br />
     <textarea name="text" id="text" cols="100" rows="15" required><?php if (isset($text)) { echo $text; } ?></textarea><br /><br />

     <label for="media">Media (Use html tags such as img, a, and iframes):</label><br /><br />
     <textarea name="media" id="media" cols="75" rows="7"><?php if (isset($media)) { echo $media; } ?></textarea><br /><br />

     <label for="break">Breaks: </label>
     <input type="text" name="break" id="break" value="<?php if (isset($break)) { echo $break; } ?>" ><br /><br />

     <label>&nbsp;</label>
     <input type="submit" name="action" value="AHOMNew">
  </fieldset>
</form>




<?php include 'views/foot.php'; ?>
