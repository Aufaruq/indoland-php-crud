<?php require_once "header.php";
require_once "core/connection.php";

@$name = $_SESSION['name'];
@$level = $_SESSION['level'];
@$id = $_SESSION['id'];
@$namalu = $_SESSION['namalu'];

if(!$name){
  header("Location: index.php?");
}

?>

<section id="login">
  <div class="container">
    <div class="row area center">
      <h1 class="master-title" style="margin-bottom:20px">Upload Gambar-mu!</h1>

      <form method="POST" action="" enctype="multipart/form-data">
        <input class="form-box" type="text" name="title" placeholder="Judul">
        <input class="form-box" type="text" name="namalu" placeholder="nama kamu">
        <input type="file" name="photo" value=""  required>
        <textarea name="descPhoto" rows="10" cols="100" class="text-area" placeholder="Deskripsikan hasil foto-mu!"></textarea>
        <input class="form-button" type="submit" name="submit" value="UPLOAD Gambar">
      </form>

      <a href="index.php?" style="text-align:center; display:block; margin-top:20px;">Cancel</a>
    </div>
  </div>
</section>

<style media="screen">
  .form-box{
    width: 730px;
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
require_once "footer.php";

$i = $_POST;
if(isset($i['submit']) ){
  $title = $i['title'];

  $sumber = $_FILES['photo']['tmp_name'];
  $dir    = "asset/img/";
  $photo  = $_FILES['photo']['name'];
  $descPhoto = $i['descPhoto'];
  $namalu = $i['namalu'];

  if($photo){
    $moved = move_uploaded_file($sumber, $dir.$photo);
    if($moved){
      $insert = "INSERT INTO aufa_photo(title,photo,date,descPhoto,namalu) VALUES('$title','$photo',now(),'$descPhoto','$namalu')";
      $result = $conn->query($insert);

      if($result){
        echo "<script>alert('Berhasil Upload! Terimakasih!');";
      }
    }

  }
}

 ?>
