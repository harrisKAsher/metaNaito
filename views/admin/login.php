<?php
if ($_SESSION['loggedin']) {
   $message = "Note: You are already loggedin!";
}

include 'views/head.php'; ?>

<h1 class="center">Login</h1>
<p><?php if (isset($message)) { echo $message; } ?></p>
<form action="." method="post">
  <fieldset class="border_none">
     <label for="userName">User Name:</label>
     <input type="text" name="userName" id="userName" required><br /><br />
     <label for="password">Password:</label>
     <input type="password" name="password" id="password" required><br /><br />
     <label>&nbsp;</label>
     <input type="submit" name="action" value="ALOGLogin">
  </fieldset>
</form>




<?php include 'views/foot.php'; ?>
