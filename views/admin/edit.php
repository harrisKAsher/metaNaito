<?php if (!$_SESSION['loggedin']) {
  header("Location: /");
} ?>

<?php include 'views/head.php'; ?>

<h1>Password Change</h1>
<p>Password must be at least 6 characters long and may not contain sapces.</p>
<b><?php if (isset($message)) { echo $message; } ?></b>
<b><?php if (isset($error)) { echo $error; } ?></b>

<form action="." method="post">
  <fieldset class="border_none">
    <label for="userID">&nbsp;</label>
    <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['userID'] ?>" required readonly><br /><br />

     <label for="userName">User Name:</label>
     <input type="text" name="userName" id="userName" value="<?php echo $_SESSION['userName'] ?>" required readonly><br /><br />

     <label for="oldPassword">Old Password:</label>
     <input type="password" name="oldPassword" id="oldPassword" required><br /><br />

     <label for="newPassword">New Password:</label>
     <input type="password" name="newPassword" id="newPassword" required><br /><br />

     <label for="rePassword">Reenter New Password:</label>
     <input type="password" name="rePassword" id="rePassword" required><br /><br />

     <label>&nbsp;</label>
     <input type="submit" name="action" value="ALOGEdit">
  </fieldset>
</form>




<?php include 'views/foot.php'; ?>
