<?php include 'views/head.php'; ?>

<div id="title">Archive 2014 July - December</div>
<br>

<?php $number = count($posts);
 foreach ($posts as $post) {
    if ($post['front_page_id'] <= $number - 15 && (strpos($post['date'], '2014')) && (strpos($post['date'], 'July') || strpos($post['date'], 'August ') || strpos($post['date'], 'September') || strpos($post['date'], 'October') || strpos($post['date'], 'November ') || strpos($post['date'], 'December'))) { ?>



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

<a href="/index.php" class="ToTheLeft">Newer News</a>
<a href="/index.php?action=IARC14_1_6" class="ToTheRight">Older News</a>
<?php include 'views/foot.php'; ?>
