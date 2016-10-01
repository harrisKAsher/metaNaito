<?php include 'views/head.php'; ?>

<div id="title">Archive 2013 January - June</div>
<br>

<?php $number = count($posts);
 foreach ($posts as $post) {
    if ($post['front_page_id'] <= $number - 15 && (strpos($post['date'], '2013')) && (strpos($post['date'], 'January') || strpos($post['date'], 'February ') || strpos($post['date'], 'March') || strpos($post['date'], 'April') || strpos($post['date'], 'May ') || strpos($post['date'], 'May'))) { ?>



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

<a href="/index.php?action=IARC13_7_12" class="ToTheLeft">Newer News</a>
<?php include 'views/foot.php'; ?>
