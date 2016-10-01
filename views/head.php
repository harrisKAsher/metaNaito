<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Meta Naito</title>
<link href="/css/styleM.css" rel="stylesheet" />
<link href="/css/style.css" rel="stylesheet" />
<link href="/css/img.css" rel="stylesheet" />
<link href="/css/comment.css" rel="stylesheet" />
<link href="/css/lightbox.css" rel="stylesheet" />


<nav><ul>
<div class="center"><a href="/index.php"><img src="/Images/bg/header.png" width="900" height="100" /></a></div>
<li><a href="#">Games</a>
<ul>
<li>



<!-- MENU -->
<a href=".?action=GROBhome"><img src="/Images/Menu_Icons/Icon/robobot.png" width="" height="75" /></a>
<a href=".?action=GRAIhome"><img src="/Images/Menu_Icons/Icon/rainbow.png" width="" height="75" /></a>
<a href=".?action=GTRIhome"><img src="/Images/Menu_Icons/Icon/triple.png" width="" height="75" /></a>
<a href=".?action=GCOLhome"><img src="/Images/Menu_Icons/Icon/Collection.png" width="" height="75" /></a>
<a href=".?action=GREThome"><img src="/Images/Menu_Icons/Icon/Return.png" width="" height="75" /></a>
</li>
<li>
<a href=".?action=GMAShome"><img src="/Images/Menu_Icons/Icon/Mass.png" width="" height="75" /></a>
<a href=".?action=GYARhome" ><img src="/Images/Menu_Icons/Icon/Yarn.png" width="" height="75" /></a>
<a href=".?action=GULThome" ><img src="/Images/Menu_Icons/Icon/ultra.png" width="" height="75" /></a>
<a href=".?action=GSQUhome" ><img src="/Images/Menu_Icons/Icon/squeak.png" width="" height="75" /></a>
<a href=".?action=GCANhome" ><img src="/Images/Menu_Icons/Icon/canvas.png" width="" height="75" /></a>
</li>
<li>
<a href=".?action=GMIRhome" ><img src="/Images/Menu_Icons/Icon/mirror.png" width="" height="75" /></a>
<a href=".?action=GAIRhome" ><img src="/Images/Menu_Icons/Icon/air_ride.png" width="" height="75" /></a>
<a href=".?action=GNIGhome" ><img src="/Images/Menu_Icons/Icon/nightmare.png" width="" height="75" /></a>
<a href=".?action=GTILhome" ><img src="/Images/Menu_Icons/Icon/tilt.png" width="" height="75" /></a>
<a href=".?action=GCRYhome" ><img src="/Images/Menu_Icons/Icon/crystal.png" width="" height="75" /></a>
</li>
<li>
<a href=".?action=GDL3home" ><img src="/Images/Menu_Icons/Icon/Dream_Land3.png" width="" height="75" /></a>
<a href=".?action=GSTAhome" ><img src="/Images/Menu_Icons/Icon/stacker.png" width="" height="75" /></a>
<a href=".?action=GSUPhome" ><img src="/Images/Menu_Icons/Icon/super_star.png" width="" height="75" /></a>
<a href=".?action=GBLOhome" ><img src="/Images/Menu_Icons/Icon/block.png" width="" height="75" /></a>
<a href=".?action=GDL2home" ><img src="/Images/Menu_Icons/Icon/dream_land2.png" width="" height="75" /></a>
</li>
<li>
<a href="/.?action=GAVAhome" ><img src="/Images/Menu_Icons/Icon/avalanche.png" width="" height="75" /></a>
<a href=".?action=GCOUhome" ><img src="/Images/Menu_Icons/Icon/course.png" width="" height="75" /></a>
<a href=".?action=GPINhome" ><img src="/Images/Menu_Icons/Icon/pinball.png" width="" height="75" /></a>
<a href=".?action=GADVhome" ><img src="/Images/Menu_Icons/Icon/adventure.png" width="" height="75" /></a>
<a href=".?action=GDL1home" ><img src="/Images/Menu_Icons/Icon/dream_land.png" width="" height="75" /></a>
</li>
</ul></li>

<li><a href="#">Info</a>
<ul class="a">
<li class="a"><a href="/info/Archive/Archive.html"> Archived news</a></li>
<li class="a"><a href="/info/articles/articles.html"> Articles</a></li>
<li class="a"><a href="/info/characters/characters.html"> Characters</a></li>
<li class="a"><a href="/info/Abilities/Abilities.html"> Copy Abilities</a></li>
<li class="a"><a href="/info/Links/Links.html"> Links</a></li>
<li class="a"><a href="/info/Locations/Locations.html"> Locations</a></li>
<li class="a"><a href="/info/donations/donations.html"> Donations</a></li>
<li class="a"><a href="/info/about/about.html"> About Us</a></li>

</ul></li>
<li><a href="#">Fan Art</a>
<ul class="b">
<li class="b"><a href="/fan_art/art/1.html"> Art</a></li>
<li class="b"><a href="/fan_art/fiction/fiction.html"> Fiction</a></li>
<li class="b"><a href="/fan_art/video/1.html"> Videos</a></li>
</ul></li>
<li><a href="http://forum.metanaito.net">Forums</a></li>
<li><a href="/contact/contact.html">Contact Us</a></li>

</ul>

</nav>




<meta name="description" content="Everything Kirby, Up to date News, Game Guides, and more!">
</head>
<body>
<div id="content"> <br>
    <?php if (isset($game)) {$side = $game;} else {$side = 'side';} ?>
    <div id="side"><?php include 'views/sides/'.$side.'.php' ?></div>
    <div id="Main_content">
        <?php if($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'admin') { ?>
            <div class="right">
                <a href="/?action=ALOGedit">Password</a> |
                <a href="/?action=ALOGlogout">Logout</a>
            </div>

        <?php } ?>
<br>
