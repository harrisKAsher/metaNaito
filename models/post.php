<?php


function displayPosts(){
global $db;
$query ='SELECT * FROM front_page
            ORDER BY front_page_id DESC';
$stmt = $db->prepare($query);
   $stmt->execute();
   $posts = $stmt->fetchAll();
   $stmt->closeCursor();
   return $posts;
}
/*

// Creates a new post
function postNew($userID, $pageID, $img_src, $img_alt, $link_path, $title, $content){
  global $db;
  $query ='INSERT INTO post
                      (userID, pageID, imgSRC, imgAlt, linkPath, title, content)
                  VALUES
                      (:userID, :pageID, :img_src, :img_alt, :link_path, :title, :content)';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':userID', $userID);
     $stmt->bindValue(':pageID', $pageID);
     $stmt->bindValue(':img_src', $img_src);
     $stmt->bindValue(':img_alt', $img_alt);
     $stmt->bindValue(':link_path', $link_path);
     $stmt->bindValue(':title', $title);
     $stmt->bindValue(':content', $content);
     $stmt->execute();
     $result = $stmt->rowCount();
     $stmt->closeCursor();
     return $result;
}
function displayPostsOld($pageID){
global $db;
$query ='SELECT * FROM post
          WHERE pageID = :pageID
            ORDER BY postID DESC';
$stmt = $db->prepare($query);
   $stmt->bindValue(':pageID', $pageID);
   $stmt->execute();
   $posts = $stmt->fetchAll();
   $stmt->closeCursor();
   return $posts;
}
function editPost($postID){
  global $db;
  $query ='SELECT * FROM post
            WHERE postID = :postID';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':postID', $postID);
     $stmt->execute();
     $postToEdit = $stmt->fetch();
     $stmt->closeCursor();
     return $postToEdit;
}
function deletePost($postID){
  global $db;
  $query ='DELETE FROM post
            WHERE postID = :postID';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':postID', $postID);
     $stmt->execute();
     $result = $stmt->rowCount();
     $stmt->closeCursor();
     return $result;
}
function edit($postID, $userID, $img_src, $img_alt, $link_path, $title, $content){
  global $db;
  $query ='UPDATE post
              SET userID = :userID, imgSRC = :img_src, imgAlt = :img_alt,
                linkPath = :link_path, title = :title, content = :content
              WHERE postID = :postID';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':postID', $postID);
     $stmt->bindValue(':userID', $userID);
     $stmt->bindValue(':img_src', $img_src);
     $stmt->bindValue(':img_alt', $img_alt);
     $stmt->bindValue(':link_path', $link_path);
     $stmt->bindValue(':title', $title);
     $stmt->bindValue(':content', $content);
     $stmt->execute();
     $result = $stmt->rowCount();
     $stmt->closeCursor();
     return $result;
}


// Comments
function commentNew($userID, $pageID, $postID, $content){
  global $db;
  $query ='INSERT INTO comment
                      (userID, postID, comment, pageID)
                  VALUES
                      (:userID, :postID, :content, :pageID)';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':userID', $userID);
     $stmt->bindValue(':postID', $postID);
     $stmt->bindValue(':pageID', $pageID);
     $stmt->bindValue(':content', $content);
     $stmt->execute();
     $result = $stmt->rowCount();
     $stmt->closeCursor();
     return $result;
}
function displayComments($pageID){
global $db;
$query ='SELECT comment.userID, postID, pageID, commentID, ima_date, comment, users.userName FROM comment
          INNER JOIN users ON comment.userID = users.userID AND
          pageID = :pageID
          ORDER BY ima_date';
$stmt = $db->prepare($query);
   $stmt->bindValue(':pageID', $pageID);
   $stmt->execute();
   $comments = $stmt->fetchAll();
   $stmt->closeCursor();
   return $comments;
}

function comment_count($postID){
global $db;
$query ='SELECT comment.userID, postID, pageID, commentID, ima_date, comment, users.userName FROM comment
          INNER JOIN users ON comment.userID = users.userID AND
          pageID = 1
          ORDER BY commentID';
$stmt = $db->prepare($query);
   $stmt->bindValue(':pageID', $pageID);
   $stmt->execute();
   $comments = $stmt->fetchAll();
   $stmt->closeCursor();
   return $comments;
}

function getUserName($userID) {
global $db;
$query ='SELECT userName FROM users
          WHERE userID = :userID';
$stmt = $db->prepare($query);
   $stmt->bindValue(':userID', $userID);
   $stmt->execute();
   $userName = $stmt->fetch();
   $stmt->closeCursor();
   return $userName;

}
function editComment($commentID){
  global $db;
  $query ='SELECT * FROM comment
            WHERE commentID = :commentID';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':commentID', $commentID);
     $stmt->execute();
     $commentToEdit = $stmt->fetch();
     $stmt->closeCursor();
     return $commentToEdit;
}

function commentEdit($commentID, $comment){
  global $db;
  $query ='UPDATE comment
              SET comment = :comment
              WHERE commentID = :commentID';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':commentID', $commentID);
     $stmt->bindValue(':comment', $comment);
     $stmt->execute();
     $result = $stmt->rowCount();
     $stmt->closeCursor();
     return $result;
}
function deleteComment($commentID){
  global $db;
  $query ='DELETE FROM comment
            WHERE commentID = :commentID';
  $stmt = $db->prepare($query);
     $stmt->bindValue(':commentID', $commentID);
     $stmt->execute();
     $result = $stmt->rowCount();
     $stmt->closeCursor();
     return $result;
}

*/
 ?>
