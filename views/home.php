<?php include 'views/head.php'; ?>

<?php if($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'admin') { ?>
    <div>
        <a href="?action=AHOMnewPost">Update</a>
    </div>
<?php } ?>

<?php $number = count($posts);
foreach ($posts as $post) {
    if ($post['front_page_id'] > $number - 15) {?>



<!-- Header of Posts -->
<div class= "center date">
    <?php echo $post['date'] ?>
</div><br>
<div class="center">
    <img src="/Images/name_tag/<?php echo $post['creator'] ?>.jpg" alt="<?php echo $post['creator'] ?>"  width="160" height="25" class="border_none"  >
</div>

<!-- Content -->
<p><?php echo $post['text'] ?></p>

         ~<?php echo str_replace('_',' ',$post['creator']) ?>
        <br><br>
<div class="ToTheLeft">
    <?php if (isset( $post['media'])) { echo $post['media'];}  ?>
</div>

<!-- Clossing -->
<div class="right"><img src="/Images/Characters/<?php echo $post['creator'] ?>.png"></div>
    <br><br><br><?php if (isset( $post['break'])) { echo $post['break'];}  ?>

       <hr align="center" color="#794F93" />

<?php }} ?>




<a href="/index.php?action=IARC14_7_12" class="ToTheRight">Older News</a>

<?php include 'views/foot.php'; ?>
