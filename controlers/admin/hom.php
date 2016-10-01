<?php
$runSwitch = substr($action, 4, strlen($action));

switch ($runSwitch) {
  //input to create new
    case 'newPost':
      include 'views/admin/posts/new.php';
      break;
  //actually creating the new post
    case 'New':
      $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
      date_default_timezone_set('US/Eastern');
      $date = date('l, F jS, Y g:i A \E\S\T');
      $text = filter_input(INPUT_POST, 'text');
      $media = filter_input(INPUT_POST, 'media');
      $break = filter_input(INPUT_POST, 'break');

      if (!isset($media)) {
        $media = '';
      }
      if (!isset($break)) {
        $break = '';
      }

      $result = newPost($userName, $date, $text, $media, $break);
      if ($result) {
        $posts = displayPosts();
        include 'views/home.php';
      } else {
        $error = "We are sorry, something didn't seem to go right...";
        include 'views/admin/posts/new.php';
      }
      break;

    case 'editPost':
      include 'views/admin/posts/edit.php';
      break;

  default:
    $posts = displayPosts();
    include 'views/home.php';
    break;
  }
