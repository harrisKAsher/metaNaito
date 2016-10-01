<?php
$runSwitch = substr($action, 4, strlen($action));
switch ($runSwitch) {
  case 'logon':
    include('views/admin/login.php');
    break;

  case 'edit':
    include('views/admin/edit.php');
    break;

  case 'Login':
  if (isset($check) && $check == "success") {
  } else {
    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $user = userInfo($userName);

    if(password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['userName'] = $user['userName'];
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['usertype'] = $user['type'];
        header("Location: /");
        break;
    } else {
        $error = "Sorry, the login failed. Please check your User Name and password and try again.";
        include 'views/admin/login.php';
        break;
    }}

  case 'logout':
      $_SESSION['loggedin'] = FALSE;
      session_destroy();
      include 'views/admin/login.php';
      break;

  case 'Edit':
  $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
  $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
  $oldPassword = filter_input(INPUT_POST, 'oldPassword', FILTER_SANITIZE_SPECIAL_CHARS);
  $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_SPECIAL_CHARS);
  $rePassword = filter_input(INPUT_POST, 'rePassword', FILTER_SANITIZE_SPECIAL_CHARS);
  $user = userInfo($userName);
  $passwordLength = strlen($newPassword);

  if (empty($userName) || empty($oldPassword) || empty($newPassword) || empty($rePassword)) {
    $error = "Invalid input, please make sure all information is input properly.";
    include('views/admin/edit.php');
    break;
  }
  elseif(!password_verify($oldPassword, $user['password'])) {
    $error = "Your old password does not match.";
    include('views/admin/edit.php');
    break;
  }
  elseif (preg_match('/ /', $newPassword)) {
    $error = "You cannot have a space in your password.";
    include('views/admin/edit.php');
    break;
  }
  elseif ($newPassword != $rePassword) {
    $error = "Please make sure the two new password inputs match.";
    include('views/admin/edit.php');
    break;
  }
  elseif ($passwordLength <= 6) {
    $error = "Your passwords must be at least 6 characters long.";
    include('views/admin/edit.php');
    break;
  }
  else {
    $check = "success";
    $password = password_hash($newPassword, PASSWORD_DEFAULT);

    $result = passUpdate($userID, $password);
    if ($result) {
      $message = "Your password has been updated!";
      include('views/admin/edit.php');
    }
      else {
        $message = "Sorry a problem occured and we could not update your password.";
        include('views/admin/edit.php');
      }
    }
    break;

    default:
      $posts = displayPosts();
      include 'views/home.php';
      break;
}
