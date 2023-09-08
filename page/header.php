<?php
require_once "core/connection.php";
session_start();
@$name = $_SESSION['name'];
@$level = $_SESSION['level'];
?>

<nav>
  <a href="index.php?"><img src="asset/img/header/indoland.png" style="float: left;
  padding: 10px 0 0 20px;"></a>
  <div class="container">
    <ul>
      <li><a href="?">Home</a></li>
      <li class="menu"><a href="?page=gallery">Fitur</a>
        <div class="list-menu">
        </div>
      </li>
      <?php if($level !='admin'){ ?>
      <li><a href="?page=contact">Kontak</a></li>
      <?php } ?>

      <?php if($name){?>
        <li><a href="?page=profile">Profile</a></li>
      <?php } ?>

      <?php if($level == 'admin'){ ?>
        <li><a href="?page=adminPanel">Admin Panel</a></li>
        <li><a href="?page=photo&action=add">Upload Gambar</a></li>
      <?php }elseif($level == 'member'){ ?>
        <li><a href="?page=photo&action=add">Upload Gambar</a></li>
      <?php }else{ echo " ";} ?>

      <!--LOGIN-->
      <?php if(!$name){ ?>
      <li class="right"><a href="?page=login" style="color:#000;">Login</a></li>
      <?php }else{?>
      <li class="right"><a href="?page=logout" style="color:#000;">Logout</a></li>
      <?php } ?>
    </ul>


  </div>
</nav>
