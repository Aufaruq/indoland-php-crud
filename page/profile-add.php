<?php
session_start();
@$level = $_SESSION['level'];
if($level !='admin'){
  header("Location: index.php?");
}

 ?>

<section id="login">
  <div class="container">
    <div class="row area center">
      <h1 class="master-title" style="margin-bottom:20px">TAMBAH USER</h1>

      <form method="POST" action="" enctype="multipart/form-data">
        <input class="form-box" type="text" name="name" placeholder="Name" required>
        <input class="form-box" type="text" name="username" placeholder="Username" required>
        <input class="form-box" type="text" name="password" placeholder="Password" required>
        <textarea name="biodata" rows="10" cols="100" class="text-area" placeholder="Isikan biodata dirimu!"></textarea>
        <input type="file" name="photo" value="" class="photo-area">
        <input class="form-box" type="text" name="level" value="" placeholder="admin/member" required>
        <input class="form-button" type="submit" name="submit" value="Tambah User">
      </form>

      <a href="index.php?" style="text-align:center; display:block; margin-top:20px;">Cancel</a>
    </div>
  </div>
</section>

<style media="screen">
  .form-box{
    margin: 0 auto;
    margin-bottom: 10px;
  }

  .photo-area{
    display: block;
    margin: 0 auto;
    margin-bottom: 20px;
  }

  .text-area{
    border: 2px solid #000;
    display: block;
    margin-bottom: 20px;
  }
</style>

<?php
require_once "core/connection.php";

$i=$_POST;

  if(isset($i['submit']) ){
        $name = $i['name'];
        $username = $i['username'];
        $password = $i['password'];
        $biodata   = $i['biodata'];
        $sumber = $_FILES['photo']['tmp_name'];
        $dir    = "asset/img/profile/";
        $photo  = $_FILES['photo']['name'];
        $level  = $i['level'];

        if(!$photo){
          $insert = "INSERT INTO aufa_users(name,username, password,photoProfile,biodata,level) VALUES('$name','$username','$password','$photo','$biodata','$level') ";
          $insert_result = $conn->query($insert);
                  if($insert_result){
                    echo "<script>alert('Data Berhasil di Tambah');</script>";
                    header("Location: ?page=adminPanel");
                  }else{
                    echo "Error";
                  }
        }elseif($photo){
          $moved = move_uploaded_file($sumber, $dir.$photo);
            if($moved){
              $insert = "INSERT INTO aufa_users(name,username, password,photoProfile,biodata,level) VALUES('$name','$username','$password','$photo','$biodata','$level') ";
              $insert_result = $conn->query($insert);
                    if($insert_result){
                      echo "<script>alert('Data Berhasil di Tambah');</script>";
                      header("Location: ?page=adminPanel");
                    }else{
                      echo "Error";
                    }
            }
        }else{
          echo "GagalUpload!";
        }
  }
?>
